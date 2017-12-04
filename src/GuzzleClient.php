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
 * @link      https://github.com/williamespindola/abstract-http-client
 */
class GuzzleClient implements HTTPClient
{
    /**
     * @var GuzzleHttp\Client $client Guzzle instance
     */
    private $client;

    /**
     * @var array $options Request options
     */
    private $options = [];

    /**
     * Initializes GuzzleClient
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
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
        return $this->client->request($method, $url, $this->options);
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
        $this->options = array_merge_recursive($this->options, $optionParams);
    }
}
