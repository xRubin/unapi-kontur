<?php

namespace unapi\kontur\prism\web;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use unapi\anticaptcha\common\AnticaptchaInterface;
use unapi\anticaptcha\common\dto\CaptchaSolvedInterface;
use unapi\kontur\prism\api\Client;
use unapi\fns\uwsfind\requests\RequestInterface;
use unapi\interfaces\ServiceInterface;
use unapi\kontur\prism\api\responses\AuthResponseInterface;

class Service implements ServiceInterface, LoggerAwareInterface
{
    /** @var Client */
    private $client;
    /** @var LoggerInterface */
    private $logger;
    /** @var ParserInterface */
    private $parser;

    protected const AUTH_URL = 'https://api.kontur.ru/auth/v5.11/authenticate-by-pass?login=\' . $this->login';


    protected const URL = 'https://service.nalog.ru/uwsfind.do';
    protected const AJAX_URL = 'https://service.nalog.ru/uwsfind-proc.json';

    /**
     * @param array $config Service configuration settings.
     */
    public function __construct(array $config = [])
    {
        if (!isset($config['client'])) {
            $this->client = new Client();
        } elseif ($config['client'] instanceof ClientInterface) {
            $this->client = $config['client'];
        } else {
            throw new \InvalidArgumentException('Client must be instance of ClientInterface');
        }

        if (!isset($config['logger'])) {
            $this->logger = new NullLogger();
        } elseif ($config['logger'] instanceof LoggerInterface) {
            $this->setLogger($config['logger']);
        } else {
            throw new \InvalidArgumentException('Logger must be instance of LoggerInterface');
        }

        if (!isset($config['parser'])) {
            $this->parser = new Parser();
        } else {
            if ($config['parser'] instanceof ParserInterface) {
                $this->parser = $config['parser'];
            } else {
                throw new \InvalidArgumentException('Parser must be instance of ParserInterface');
            }
        }
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @inheritdoc
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function auth(Credentials $credentials): PromiseInterface
    {
        if ($credentials->getAuthSid())
            return new FulfilledPromise($credentials);

        $this->getClient()->requestAsync('POST', self::AUTH_URL, [
            'query' => [
                'login' => $credentials->getLogin()
            ],
            'body' => $credentials->getPassword()
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseAuthResponse($response);
        })->then(function (AuthResponseInterface $response) use (&$credentials) {
            $credentials->setAuthSid($response->getSid());
            return $credentials;
        });
    }

    public function getAuthUser


    /**
     * @param RequestInterface $request
     * @return PromiseInterface
     */
    public function findDeclarations(RequestInterface $request): PromiseInterface
    {
        return $this->initialPage($this->getClient())->then(function (ResponseInterface $response) use ($request) {

            {
                // dirty
                preg_match("/<input type=\"hidden\" name=\"captchaToken\" value=\"([^\"]*)/ism", $response->getBody()->getContents(), $matches);

                if (!array_key_exists(1, $matches))
                    throw new \RuntimeException('Captcha token not found');

                $captchaToken = $matches[1];
                $response->getBody()->rewind();
            }

            return $this->getAnticaptcha()->getAnticaptchaPromise($this->getClient(), $response)
                ->then(function (CaptchaSolvedInterface $solved) use ($request, $captchaToken) {
                    return $this->submitForm($request, $solved, $captchaToken);
                });

        })->then(function (ResponseInterface $response) {
            return $this->parser->parseResponse($response);
        });
    }

    /**
     * @param ClientInterface $client
     * @return PromiseInterface
     */
    protected function initialPage(ClientInterface $client)
    {
        return $client->requestAsync('GET', self::URL);
    }

    /**
     * @param RequestInterface $request
     * @param CaptchaSolvedInterface $captcha
     * @param string $captchaToken
     * @return PromiseInterface
     */
    protected function submitForm(RequestInterface $request, CaptchaSolvedInterface $captcha, string $captchaToken): PromiseInterface
    {
        return $this->getClient()->requestAsync('POST', self::AJAX_URL, [
            'form_params' => FormFactory::getForm($request) + [
                    'captcha' => $captcha->getCode(),
                    'captchaToken' => $captchaToken
                ]
        ]);
    }
}