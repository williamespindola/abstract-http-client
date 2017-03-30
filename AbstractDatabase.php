<?php
/**
 * My project description
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   My\NameSpace\Database
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @link      link
 */
declare(strict_types=1);

namespace My\NameSpace\Database;

use Doctrine\DBAL\Connection;

/**
 * Abstract database
 *
 * @category  PHP
 * @package   My\NameSpace\Database
 * @author    William Espindola <oi@williamespindola.com.br>
 * @copyright Free
 * @license   MIT
 * @version   Release: 0.0.0
 * @link      
 */
abstract class AbstractDatabase
{
    /**
     * @var Doctrine\DBAL\Connection $connection Doctrine connection instance
     */
    protected $connection;

    /**
     * Initializes AbstractDatabase class
     *
     * @param Connection $connection Doctrine connection instance
     *
     * @return void
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
