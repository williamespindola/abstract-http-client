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
 * @link      https://github.com/williamespindola/abstract-http-client-guzzle
 */
declare(strict_types=1);

namespace WilliamEspindola\AbstractHTTPClient;

use Exception;
use InvalidArgumentException;

/**
 * Abstracts request resources
 *
 * @category  PHP
 * @package   WilliamEspindola\AbstractHTTPClient
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 1.0.0
 * @link      https://github.com/williamespindola/abstract-http-client-guzzle
 */
abstract class AbstractRequest
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var Client $httpClient Cliente implementation
     */
    protected $httpClient;

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
     * @param HTTPClient $httpClient HTTP Client implementation
     * @param string     $baseUrl    Base API URL
     */
    public function __construct(HTTPClient $httpClient, string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        $this->httpClient = $httpClient;
    }

    /**
     * Get URI concatenating base url api with resource end point
     *
     * @return string URI end point
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
     * @return void
     */
    protected function setParameters(array $parameters): void
    {
        if (empty($parameters)) {
            throw new InvalidArgumentException('Parameters can not be null');
        }

        $this->uri = null;

        foreach ($parameters as $key => $param) {
            $this->uri = str_replace($key, $param, $this->endPoint);
        }
    }
}
