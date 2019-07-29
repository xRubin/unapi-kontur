<?php

namespace unapi\kontur\prism\web;

use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use unapi\kontur\prism\web\responses;

use function GuzzleHttp\json_decode;

class Parser implements ParserInterface
{
    private $authUserResponseClass = responses\AuthUserResponse::class;
    private $tokenByPasswordResponseClass = responses\TokenByPasswordResponse::class;
    private $companiesByInnResponseClass = responses\CompaniesByInnResponse::class;

    /**
     * @param array $config Service configuration settings.
     */
    public function __construct(array $config = [])
    {
        if (isset($config['authUserResponseClass'])) {
            if ($config['authUserResponseClass'] instanceof responses\AuthUserResponseInterface) {
                $this->authUserResponseClass = $config['authUserResponseClass'];
            } else {
                throw new \InvalidArgumentException('authUserResponseClass must implement AuthUserResponseInterface');
            }
        }

        if (isset($config['tokenByPasswordResponseClass'])) {
            if ($config['tokenByPasswordResponseClass'] instanceof responses\TokenByPasswordResponseInterface) {
                $this->tokenByPasswordResponseClass = $config['tokenByPasswordResponseClass'];
            } else {
                throw new \InvalidArgumentException('tokenByPasswordResponseClass must implement TokenByPasswordResponseInterface');
            }
        }

        if (isset($config['companiesByInnResponseClass'])) {
            if ($config['companiesByInnResponseClass'] instanceof responses\CompaniesByInnResponseInterface) {
                $this->companiesByInnResponseClass = $config['companiesByInnResponseClass'];
            } else {
                throw new \InvalidArgumentException('companiesByInnResponseClass must implement CompaniesByInnResponseInterface');
            }
        }
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

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseTokenByPasswordResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->tokenByPasswordResponseClass::toDto(
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
    public function parseCompaniesByInnResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->companiesByInnResponseClass::toDto(
                json_decode(
                    $response->getBody()->getContents(),
                    true
                )
            )
        );
    }
}