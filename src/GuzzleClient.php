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

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Implements GuzzleHttp Client
 *
 * @category  PHP
 * @package   WilliamEspindola\AbstractHTTPClient
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      https://github.com/williamespindola/abstract-http-client-guzzle
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
     * @param Client $httpClient
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
     * @return string Body GuzzleHttp\Psr7\Response
     */
    public function request(string $method, string $url): Response
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
    public function setOptions(array $optionParams): void
    {
        $this->options = $optionParams;
    }
}
