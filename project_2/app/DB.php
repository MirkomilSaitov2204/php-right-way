<?php

declare(strict_types=1);

namespace Domain;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use PDO;

/**
 * @mixin PDO
 */
class DB
{
    private Connection $connection;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
         $this->connection = DriverManager::getConnection($config);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }
}