<?php

namespace unapi\kontur\prism;

use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use unapi\kontur\prism\responses;

use function GuzzleHttp\json_decode;

class Parser implements ParserInterface
{
    private $authResponseClass = responses\AuthResponse::class;
    private $authUserResponseClass = responses\AuthUserResponse::class;
    private $apiKeysResponseClass = responses\ApiKeysResponse::class;

    /**
     * @param array $config Service configuration settings.
     */
    public function __construct(array $config = [])
    {
        if (isset($config['authResponseClass'])) {
            if ($config['authResponseClass'] instanceof responses\AuthResponseInterface) {
                $this->authResponseClass = $config['authResponseClass'];
            } else {
                throw new \InvalidArgumentException('authResponseClass must implement AuthResponseInterface');
            }
        }

        if (isset($config['authUserResponseClass'])) {
            if ($config['authUserResponseClass'] instanceof responses\AuthUserResponseInterface) {
                $this->authUserResponseClass = $config['authUserResponseClass'];
            } else {
                throw new \InvalidArgumentException('authUserResponseClass must implement AuthUserResponseInterface');
            }
        }

        if (isset($config['apiKeysResponseClass'])) {
            if ($config['apiKeysResponseClass'] instanceof responses\ApiKeysResponseInterface) {
                $this->apiKeysResponseClass = $config['apiKeysResponseClass'];
            } else {
                throw new \InvalidArgumentException('apiKeysResponseClass must implement apiKeysResponseInterface');
            }
        }
    }

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseAuthResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->authResponseClass::toDto(
                json_decode(
                    $response->getBody()->getContents(),
                    true
                )
            )
        );
    }

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseApiKeysResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->apiKeysResponseClass::toDto(
                json_decode(
                    $response->getBody()->getContents(),
                    true
                )
            )
        );
    }

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseAuthUserResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->authUserResponseClass::toDto(
                json_decode(
                    $response->getBody()->getContents(),
                    true
                )
            )
        );
    }
}