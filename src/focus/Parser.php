<?php

namespace unapi\kontur\focus;

use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use unapi\kontur\focus\responses;

use function GuzzleHttp\json_decode;

class Parser implements ParserInterface
{
    private $reqResponseClass = responses\ReqResponse::class;

    /**
     * @param array $config Service configuration settings.
     */
    public function __construct(array $config = [])
    {
        if (isset($config['reqResponseClass'])) {
            if ($config['reqResponseClass'] instanceof responses\ReqResponseInterface) {
                $this->reqResponseClass = $config['reqResponseClass'];
            } else {
                throw new \InvalidArgumentException('reqResponseClass must implement ReqResponseInterface');
            }
        }
    }

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseReqResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->reqResponseClass::toDto(
                json_decode(
                    $response->getBody()->getContents(),
                    true
                )
            )
        );
    }
}