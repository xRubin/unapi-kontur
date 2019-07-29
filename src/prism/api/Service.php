<?php

namespace unapi\kontur\prism\api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use unapi\interfaces\ServiceInterface;
use unapi\kontur\prism\api\responses\AuthResponseInterface;
use unapi\kontur\prism\common\CredentialsInterface;

class Service implements ServiceInterface, LoggerAwareInterface
{
    /** @var ClientInterface */
    private $client;
    /** @var LoggerInterface */
    private $logger;
    /** @var ParserInterface */
    private $parser;

    protected const AUTH_URL = 'https://api.kontur.ru/auth/v5.11/authenticate-by-pass';

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

        return $this->getClient()->requestAsync('POST', self::AUTH_URL, [
            'query' => [
                'login' => $credentials->getLogin()
            ],
            'body' => $credentials->getPassword()
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseAuthResponse($response);
        })->then(function (AuthResponseInterface $response) use (&$credentials) {
            return $credentials->setAuthSid($response->getSid());
        });
    }

    /**
     * @param CredentialsInterface $credentials
     * @return string
     */
    protected function getApiKeysUrl(CredentialsInterface $credentials)
    {
        return sprintf('/api/banks/%s/api-keys/%s', $credentials->getBankId(), $credentials->getApiKey());
    }

    /**
     * GET /banks/{bankId}/api-keys/{apiKeyValue}
     * Статистика по API ключу
     * @param CredentialsInterface $credentials
     * @return PromiseInterface
     */
    public function getApiKeys(CredentialsInterface $credentials): PromiseInterface
    {
        return $this->getClient()->requestAsync('GET', $this->getApiKeysUrl($credentials), [
            'headers' => [
                'X-KYC-APIKEY' => $credentials->getApiKey(),
                'Authorization' => "auth.sid {$credentials->getAuthSid()}",
            ],
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseApiKeysResponse($response);
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
                'Authorization' => "auth.sid {$credentials->getAuthSid()}",
            ]
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseAuthUserResponse($response);
        });
    }
}