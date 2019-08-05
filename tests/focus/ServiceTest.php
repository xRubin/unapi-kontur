<?php

use PHPUnit\Framework\TestCase;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

use unapi\kontur\focus\ {
    Client,
    Credentials,
    Service,
    responses,
    objects\Requisites
};

class ServiceTest extends TestCase
{
    protected function getService(HandlerStack $handler)
    {
        return new Service([
            'client' => new Client(['handler' => $handler]),
            'credentials' => new Credentials('Your Key'),
        ]);
    }

    public function testApiKeys()
    {
        $service = $this->getService(
            HandlerStack::create(
                new MockHandler([
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/7736050003.json')),
                ])
            )
        );

        /** @var responses\ReqResponseInterface $result */
        $result = $service->req('7736050003')->wait();

        $this->assertInstanceOf(responses\ReqResponseInterface::class, $result);

        foreach ($result as $requisites) {
            $this->assertInstanceOf(Requisites::class, $requisites);
            /** @var Requisites $requisites */
        }
    }
}
