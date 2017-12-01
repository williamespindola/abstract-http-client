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
interface HTTPClient
{
    /**
     * Execute request
     *
     * @param string $method GET|PUT|POST|DELETE
     * @param string $url    Url
     *
     * @return string Body response
     */
    public function request(string $method, string $url): Response;

    /**
     * Set request options
     *
     * @param string $optionParams Ooption params
     *
     * @return void
     */
    public function setOptions(array $optionParams): void;
}
