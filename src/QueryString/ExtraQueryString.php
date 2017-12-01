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

namespace WilliamEspindola\AbstractHTTPClient\QueryString;

/**
 * Manange extra query string options like Limit, Offset and Sort
 *
 * @category  PHP
 * @package   WilliamEspindola\AbstractHTTPClient
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 0.0.0
 * @link      https://github.com/williamespindola/abstract-http-client-guzzle
 */
trait ExtraQueryString
{
    /**
     * @var array $queryString query string elements
     */
    private $queryString = [];

    /**
     * Limit result
     *
     * @param Integer $number The number of results
     *
     * @return void
     */
    public function setLimit(int $number): void
    {
        $this->queryString[] = 'limit=' . $number;
    }

    /**
     * Offset result
     *
     * @param Integer $offset Offset result
     *
     * @return void
     */
    public function setOffset(int $offset): void
    {
        $this->queryString[] = 'offset=' . $offset;
    }

    /**
     * Sort result
     *
     * @param array $sort Sort the result options
     *
     * @return void
     */
    public function setSort(array $sort): void
    {
        if (count($sort) == 1) {
            $sort = $sort[0];
        }

        if (count($sort) > 1) {
            $sort = implode(',', $sort);
        }

        $this->queryString[] = 'sort=' . $sort;
    }

    /**
     * Get uri with extra query strings
     *
     * @param String $uri String uri
     *
     * @return String Uri concatenated with extra query string
     */
    public function getUriWithExtraString(string $uri): String
    {
        if (!$this->queryString) {
            return $uri;
        }

        return $uri . '?' . implode('&', $this->queryString);
    }
}
