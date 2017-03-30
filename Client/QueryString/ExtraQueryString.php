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

namespace :project_name\Client\QueryString;

/**
 * Manange extra query string options like Limit, Offset and Sort
 *
 * @category  PHP
 * @package   :project_name\Client
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 0.0.0
 * @link      :project_url
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
    public function setLimit(int $number)
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
    public function setOffset(int $offset)
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
    public function setSort(array $sort)
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
    public function getUriWithExtraString(string $uri)
    {
        if (!$this->queryString) {
            return $uri;
        }

        return $uri . '?' . implode('&', $this->queryString);
    }
}
