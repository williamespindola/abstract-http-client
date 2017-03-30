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

namespace ArizonaTecnologia\PimSdk\Client;

/**
 * Abstracts http clients implementation
 *
 * Implements GuzzleHttp Client
 *
 * @category  PHP
 * @package   :project_name\Client
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      :project_url
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
    public function request(string $method, string $url);

    /**
     * Set request options
     *
     * @param string $optionParams Ooption params
     *
     * @return void
     */
    public function setOptions(array $optionParams);
}
