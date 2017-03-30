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

use GuzzleHttp\Client;

/**
 * Implements GuzzleHttp Client
 *
 * @category  PHP
 * @package   :project_name\Client
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      :project_url
 */
class GuzzleClient implements HTTPClient
{
    /**
     * @var GuzzleHttp\Client $httpClient Guzzle instance
     */
    private $httpClient;

    /**
     * @var array $options Request options
     */
    private $options = [];

    /**
     * Initializes GuzzleClient
     *
     * @return void
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Execute request
     *
     * @param string $method GET|PUT|POST|DELETE
     * @param string $url    Url
     *
     * @return string Body response
     */
    public function request(string $method, string $url)
    {
        return $this->httpClient->request($method, $url, $this->options);
    }

    /**
     * Set options to request
     *
     * @param string $optionParams Ooption params
     *
     * @return void
     */
    public function setOptions(array $optionParams)
    {
        $this->options = $optionParams;
    }
}
