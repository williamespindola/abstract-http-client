<?php

namespace WilliamEspindola\AbstractHTTPClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use WilliamEspindola\AbstractHTTPClient\GuzzleClient;

class GuzzleClientTest extends TestCase
{
    public function testRequestShouldReturnAResponseInstance()
    {
        $mockResponse = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->setMethods(['getStatusCode', 'getBody', 'getContents'])
            ->getMock();

        $mockClient = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->setMethods(['request'])
            ->getMock();

        $mockClient->method('request')
            ->willReturn($mockResponse);

        $instance = new GuzzleClient($mockClient);

        $this->assertInstanceOf(
            Response::class,
            $instance->request('POST', 'http://foo.bar')
        );
    }
}
