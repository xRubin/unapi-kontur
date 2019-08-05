<?php

namespace unapi\kontur\focus;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

interface ParserInterface
{
    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseReqResponse(ResponseInterface $response): PromiseInterface;
}