<?php

namespace unapi\kontur\prism\api;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

interface ParserInterface
{
    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseAuthResponse(ResponseInterface $response): PromiseInterface;

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseAuthUserResponse(ResponseInterface $response): PromiseInterface;

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseApiKeysResponse(ResponseInterface $response): PromiseInterface;
}