<?php
/**
 * This file is part of :project_name
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   WilliamEspindola\AbstractHTTPClient
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      https://github.com/williamespindola/abstract-http-client
 */
declare(strict_types=1);

namespace WilliamEspindola\AbstractHTTPClient;

use Exception;
use InvalidArgumentException;
use WilliamEspindola\AbstractHTTPClient\HTTPClient;

/**
 * Abstracts request resources
 *
 * @category  PHP
 * @package   WilliamEspindola\AbstractHTTPClient
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 1.0.0
 * @link      https://github.com/williamespindola/abstract-http-client
 */
abstract class AbstractRequest
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var Client $client Cliente implementation
     */
    protected $client;

    /**
     * @var string $baseUrl Base API URL
     */
    protected $baseUrl;

    /**
     * @var string $uri String that identifies resource
     */
    private $uri;

    /**
     * Initializes new AbstractNuxeoIntegration
     *
     * @param HTTPClient $client HTTPClient implementation
     * @param string     $baseUrl    Base API URL
     */
    public function __construct(HTTPClient $client, string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        $this->client = $client;
    }

    /**
     * Get URI concatenating base url api with resource end point
     *
     * @return string URI end point
     *
     * @throws Exception If AbstractRequest::baseUrl or AbstractRequest::uri was empty
     */
    protected function getURI(): string
    {
        if (empty($this->baseUrl) || empty($this->uri)) {
            throw new Exception('Url or end point can not be null');
        }

        return $this->baseUrl . $this->uri;
    }

    /**
     * Set url parameters
     *
     * @param array $parameters array with parameters that must be setted
     *
     * <code>
     *  $this->setParameters([
     *      ':paramkey' => 'my param value'
     *  ]);
     * </code>
     *
     * @throws InvalidArgumentException If parameters param was empty
     * @throws Exception                If parametes not match with request endPoint
     *
     * @return void
     */
    protected function setParameters(array $parameters)
    {
        if (empty($parameters)) {
            throw new InvalidArgumentException('Parameters can not be null');
        }

        $this->uri = null;

        foreach ($parameters as $key => $param) {
            if (preg_match("/{$key}/i", $this->endPoint)) {
                if (is_null($this->uri)) {
                    $this->uri = $this->endPoint;
                }

                $this->uri = str_replace($key, $param, $this->uri);
            }
        }

        if (empty($this->uri)) {
            throw new Exception(
                'Parameters definition not matches with request end point'
            );
        }
    }
}
