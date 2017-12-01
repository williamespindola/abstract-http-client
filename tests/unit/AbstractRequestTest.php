<?php

namespace WilliamEspindola\AbstractHTTPClient;

use PHPUnit\Framework\TestCase;
use WilliamEspindola\AbstractHTTPClient\GuzzleClient;
use WilliamEspindola\AbstractHTTPClient\AbstractRequest;

class DummyRequest extends AbstractRequest
{
    protected $endPoint = ':param/baz';

    public function request(string $param)
    {
        $this->setParameters([':param' => $param]);

        return $this->getURI();
    }
}

class DummyEmptyParametersRequest extends AbstractRequest
{
    public function request()
    {
        $this->setParameters([]);
    }
}

class DummyWrongParametersRequest extends AbstractRequest
{
    protected $endPoint = 'foo/:bar';

    public function request()
    {
        $this->setParameters([':baz' => 'baz']);

        $this->getURI();
    }
}

class AbstractRequestTest extends TestCase
{
    /**
     * @expectedException        InvalidArgumentException
     * @expectedMEssageException Parameters can not be null
     */
    public function testSetParametersWithEmptyArrayShouldThrowAnException()
    {
        $mockGuzzleClient = $this->getMockBuilder(GuzzleClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $instance = new DummyEmptyParametersRequest($mockGuzzleClient, 'foo/');
        $instance->request();
    }

    /**
     * @expectedException        Exception
     * @expectedMEssageException Parameters definition not matches with request endPoint
     */
    public function testSetParametersWithWrongArrayShouldThrowAnException()
    {
        $mockGuzzleClient = $this->getMockBuilder(GuzzleClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $instance = new DummyWrongParametersRequest($mockGuzzleClient, 'foo/');

        $instance->request();
    }

    public function testGetURIWithParamsShouldWork()
    {
        $mockGuzzleClient = $this->getMockBuilder(GuzzleClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $instance = new DummyRequest($mockGuzzleClient, 'foo/');

        $this->assertEquals(
            'foo/bar/baz',
            $instance->request('bar')
        );
    }
}
