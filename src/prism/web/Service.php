<?php

namespace unapi\kontur\prism\web;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use unapi\interfaces\ServiceInterface;
use unapi\kontur\prism\common\CredentialsInterface;
use unapi\kontur\prism\web\responses\AuthUserResponseInterface;
use unapi\kontur\prism\web\responses\TokenByPasswordResponseInterface;

class Service implements ServiceInterface, LoggerAwareInterface
{
    /** @var ClientInterface */
    private $client;
    /** @var LoggerInterface */
    private $logger;
    /** @var ParserInterface */
    private $parser;

    protected const INITIAL_URL = '/';
    protected const AUTH_URL = 'https://auth.kontur.ru/?back=https%3A%2F%2Fkyc.kontur.ru';

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

    /**
     * @param CredentialsInterface $credentials
     * @return PromiseInterface
     */
    public function auth(CredentialsInterface $credentials): PromiseInterface
    {
        if ($credentials->getAuthSid())
            return new FulfilledPromise($credentials);

        return $this->getClient()->requestAsync('GET', self::AUTH_URL)
            ->then(function (ResponseInterface $response) use ($credentials) {
                return $this->getTokenByPassword($credentials);
            })->then(function (TokenByPasswordResponseInterface $response) use (&$credentials) {
                return new FulfilledPromise($credentials->setAuthSid($response->getSid()));
            })->then(function (CredentialsInterface $credentials) {
                return $this->getApiKey()->then(function (string $apiKey) use (&$credentials) {
                    $credentials->setApiKey($apiKey);
                    return $this->getAuthUser($credentials)->then(function (AuthUserResponseInterface $response) use ($credentials) {
                        return new FulfilledPromise($credentials);
                    });
                });
            });
    }

    protected function getApiKey(): PromiseInterface
    {
        return $this->getClient()->requestAsync('GET', self::INITIAL_URL)->then(function (ResponseInterface $response) {
            if (preg_match('/\/static\/js\/main\.[\da-f]{8}\.js/is', $response->getBody()->getContents(), $matches)) {
                return $this->getClient()->requestAsync('GET', $matches[0]);
            }

            throw new \RuntimeException('Packed js not not found.');
        })->then(function (ResponseInterface $response) {
            if (preg_match_all('/[\dA-F]{8}-[\dA-F]{4}-[\dA-F]{4}-[\dA-F]{4}-[\dA-F]{12}/is', $response->getBody()->getContents(), $matches)) {
                return new FulfilledPromise($matches[0][1]);
            }

            throw new \RuntimeException('ApiKey not found.');
        });
    }

    protected function getTokenByPassword(CredentialsInterface $credentials)
    {
        $cookies = array_column($this->getClient()->getConfig('cookies')->toArray(), 'Value', 'Name');

        if (empty($antiForgery = $cookies['AntiForgery']))
            throw new \RuntimeException('AntiForgery cookie not found.');

        return $this->getClient()->requestAsync('POST', 'https://auth.kontur.ru/Handlers/GetTokenByPassword.ashx?version=v5', [
            'form_params' => [
                'login' => $credentials->getLogin(),
                'password' => $credentials->getPassword(),
                'remember' => false,
                'AntiForgery' => $antiForgery,
            ]
        ])->then(function (ResponseInterface $response) {
            //string(362) "{"TrustedCertificates":null,"Status":"ok","Messages":[],"Token":"7639C3A78D14AB8E20D4CAF47C1779B63608CFA1B51C1404EBEB628A3931C27DD940AC98C522759A5321370D088414EC1A6C1FD84536FFAFCFD2A1C671604F9CB7C29401840663DD50C42E04A582765F125C0F323F14D9F4FB39EF96E1B3F1BC","Sid":"02EDF88E65F43E44A0EF8709C441B5777D9ED073342FBB4CB649AF99843B1056","Thumbprint":null,"IsV5":true}"
            return $this->parser->parseTokenByPasswordResponse($response);
        });
    }

    /**
     * @param CredentialsInterface $credentials
     * @return string
     */
    protected function getAuthUserUrl(CredentialsInterface $credentials)
    {
        return '/api/auth/user';
    }

    /**
     * GET /auth/user
     * Получение текущего аутентифицированного пользователя
     * @param CredentialsInterface $credentials
     * @return PromiseInterface
     */
    public function getAuthUser(CredentialsInterface $credentials): PromiseInterface
    {
        return $this->getClient()->requestAsync('GET', $this->getAuthUserUrl($credentials), [
            'headers' => [
                'X-KYC-APIKEY' => $credentials->getApiKey(),
            ]
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseAuthUserResponse($response);
        });
    }

    /**
     * @param CredentialsInterface $credentials
     * @param string $inn
     * @return string
     */
    protected function getCompaniesByInnUrl(CredentialsInterface $credentials, string $inn)
    {
        return sprintf('/api/banks/%s/companies?inn=%s', $credentials->getBankId(), $inn);
    }

    /**
     * GET /api/banks/32e93612-061a-4ee2-b71d-ecf8550d45d1/companies?inn=<inn>
     * Получение текущего аутентифицированного пользователя
     * @param CredentialsInterface $credentials
     * @param string $inn
     * @return PromiseInterface
     */
    public function getCompaniesByInn(CredentialsInterface $credentials, string $inn): PromiseInterface
    {
        return $this->getClient()->requestAsync('GET', $this->getCompaniesByInnUrl($credentials, $inn), [
            'headers' => [
                'Accept' => 'application/json',
                'X-KYC-APIKEY' => $credentials->getApiKey(),
                'Referer' => 'https://kyc.kontur.ru/32e93612-061a-4ee2-b71d-ecf8550d45d1/?orgId=7715781186&modelId=ffbdb7bf-2d58-43cd-ae84-e226efb34dba',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36',
            ],
            'debug' => true,
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseCompaniesByInnResponse($response);
        });
    }
}