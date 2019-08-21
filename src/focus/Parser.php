<?php

namespace unapi\kontur\focus;

use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

use function GuzzleHttp\json_decode;

class Parser implements ParserInterface
{
    private $reqResponseClass = requests\req\Response::class;
    private $egrDetailsResponseClass = requests\egrDetails\Response::class;

    /**
     * @param array $config Service configuration settings.
     */
    public function __construct(array $config = [])
    {
        if (isset($config['reqResponseClass'])) {
            if ($config['reqResponseClass'] instanceof requests\req\ResponseInterface) {
                $this->reqResponseClass = $config['reqResponseClass'];
            } else {
                throw new \InvalidArgumentException('reqResponseClass must implement requests\req\ResponseInterface');
            }
        }

        if (isset($config['egrDetailsResponseClass'])) {
            if ($config['egrDetailsResponseClass'] instanceof requests\egrDetails\ResponseInterface) {
                $this->egrDetailsResponseClass = $config['egrDetailsResponseClass'];
            } else {
                throw new \InvalidArgumentException('egrDetailsResponseClass must implement  requests\egrDetails\ResponseInterface');
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

    /**
     * @param ResponseInterface $response
     * @return PromiseInterface
     */
    public function parseEgrDetailsResponse(ResponseInterface $response): PromiseInterface
    {
        return new FulfilledPromise(
            $this->egrDetailsResponseClass::toDto(
                json_decode(
                    $response->getBody()->getContents(),
                    true
                )
            )
        );
    }
}