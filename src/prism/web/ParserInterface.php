<?php

namespace unapi\kontur\prism\web;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

interface ParserInterface
{
    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseAuthUserResponse(ResponseInterface $response): PromiseInterface;

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseTokenByPasswordResponse(ResponseInterface $response): PromiseInterface;

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseCompaniesByInnResponse(ResponseInterface $response): PromiseInterface;
}