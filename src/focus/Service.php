<?php

namespace unapi\kontur\focus;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use unapi\interfaces\ServiceInterface;

class Service implements ServiceInterface, LoggerAwareInterface
{
    /** @var ClientInterface */
    private $client;
    /** @var CredentialsInterface */
    private $credentials;
    /** @var LoggerInterface */
    private $logger;
    /** @var ParserInterface */
    private $parser;

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

        if (!isset($config['credentials'])) {
            throw new \InvalidArgumentException('Credentials required');
        } elseif ($config['credentials'] instanceof CredentialsInterface) {
            $this->credentials = $config['credentials'];
        } else {
            throw new \InvalidArgumentException('Credentials must be instance of CredentialsInterface');
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
     * @return CredentialsInterface
     */
    public function getCredentials(): CredentialsInterface
    {
        return $this->credentials;
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
     * @param string|null $inn
     * @param string|null $ogrn
     * @return PromiseInterface
     */
    public function req(string $inn = null, string $ogrn = null): PromiseInterface
    {
        return $this->getClient()->requestAsync('GET', '/api3/req', [
            'query' => [
                'key' => $this->getCredentials()->getKey(),
                'inn' => $inn,
                'ogrn' => $ogrn,
            ],
        ])->then(function (ResponseInterface $response) {
            return $this->parser->parseReqResponse($response);
        });
    }
}