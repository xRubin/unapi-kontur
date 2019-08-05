<?php

namespace tests\prism;

use PHPUnit\Framework\TestCase;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

use unapi\kontur\prism\ {
    Client,
    Credentials,
    Service,
    responses
};

class ServiceTest extends TestCase
{
    protected function getService(HandlerStack $handler)
    {
        return new Service([
            'client' => new Client(['handler' => $handler]),
        ]);
    }

    protected function getCredentials()
    {
        return new Credentials('example@example.com', 'password', '31e94610-021a-42e2-b71d-3cf8250e4571', '4d529cb4-757f-be41-834f-c35af2d7e1d1');
    }

    public function testApiKeys()
    {
        $service = $this->getService(
            HandlerStack::create(
                new MockHandler([
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/auth.json')),
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/api-keys.json')),
                ])
            )
        );

        /** @var responses\ApiKeysResponseInterface $result */
        $result = $service->auth($this->getCredentials())->then(function (Credentials $credentials) use ($service) {
            return $service->getApiKeys($credentials);
        })->wait();

        $this->assertInstanceOf(responses\ApiKeysResponseInterface::class, $result);

        $this->assertTrue($result->isActive());
        $this->assertEquals('Api', $result->getType());
        $this->assertInternalType('array', $result->getLimits());
    }

    public function testUserAuth()
    {
        $service = $this->getService(
            HandlerStack::create(
                new MockHandler([
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/auth.json')),
                    new Response(200, [], file_get_contents(__DIR__ . '/responses/auth-user.json')),
                ])
            )
        );

        /** @var responses\AuthUserResponseInterface $result */
        $result = $service->auth($this->getCredentials())->then(function (Credentials $credentials) use ($service) {
            return $service->getAuthUser($credentials);
        })->wait();

        $this->assertInstanceOf(responses\AuthUserResponseInterface::class, $result);

        $this->assertEquals($this->getCredentials()->getBankId(), $result->getClientId());
        $this->assertEquals(' ', $result->getName());
        $this->assertFalse($result->isSuperAdmin());
        $this->assertTrue($result->hasRoles());
        $this->assertTrue($result->isOrgAdmin());
        $this->assertFalse($result->isSeller());
    }
}
