<?php

namespace tests\focus;

use PHPUnit\Framework\TestCase;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

use unapi\kontur\focus\{
    Client, Credentials, requests, Service
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

    /**
     * @param $inn
     * @dataProvider innProvider
     */
    public function testRequestReq($inn)
    {
        $service = $this->getService(
            HandlerStack::create(
                new MockHandler([
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/req/' . $inn . '.json')),
                ])
            )
        );

        /** @var requests\req\ResponseInterface $result */
        $result = $service->req($inn)->wait();

        $this->assertInstanceOf(requests\req\ResponseInterface::class, $result);

        foreach ($result as $requisites) {
            $this->assertInstanceOf(requests\req\structures\Requisites::class, $requisites);
            /** @var requests\req\structures\Requisites $requisites */
        }
    }

    /**
     * @param $inn
     * @dataProvider innProvider
     */
    public function testRequestEgrDetails($inn)
    {
        $service = $this->getService(
            HandlerStack::create(
                new MockHandler([
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/egrDetails/' . $inn . '.json')),
                ])
            )
        );

        /** @var requests\egrDetails\ResponseInterface $result */
        $result = $service->egrDetails($inn)->wait();

        $this->assertInstanceOf(requests\egrDetails\ResponseInterface::class, $result);

        foreach ($result as $requisites) {
            $this->assertInstanceOf(requests\egrDetails\structures\EgrDetails::class, $requisites);
            /** @var requests\egrDetails\structures\EgrDetails $requisites */
        }
    }

    public function innProvider()
    {
        return [
            ['7736050003'],
            ['6663003127'],
            ['3245001416'],
        ];
    }
}
