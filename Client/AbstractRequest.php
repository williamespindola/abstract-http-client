<?php
/**
 * This file is part of :project_name
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   :project_name\Client
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      :project_url
 */
declare(strict_types=1);

namespace :project_name\Client;

use InvalidArgumentException;
use Exception;

/**
 * Abstracts request resources
 *
 * @category  PHP
 * @package   :project_name\Client
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 0.0.0
 * @link      :project_url
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
    protected function getURI()
    {
        if (empty($this->url) || empty($this->endPoint)) {
            throw new Exception('Url or end point can not be null');
        }

        return $this->url . $this->endPoint;
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
     */
    protected function setParameters(array $parameters)
    {
        if (empty($parameters)) {
            throw new InvalidArgumentException('Parameters can not be null');
        }

        foreach ($parameters as $key => $param) {
            $this->endPoint = str_replace($key, $param, $this->endPoint);
        }
    }
}
