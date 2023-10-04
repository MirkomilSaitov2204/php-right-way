<?php

namespace App;

/**
 * @mixin \PDO
 */
class DB
{
//    private static ?DB $instance = null;
//
//    private function __construct(public array $config)
//    {
//        echo "Instance created";
//    }
//
//    public static function getInstance(array $config): DB
//    {
//        if (self::$instance == null)
//            self::$instance = new DB($config);
//        return  self::$instance;
//    }


    private \PDO $pdo;

    public function __construct(protected array $config)
    {
        try {
            $this->pdo = new \PDO('mysql:host=' . $config['host'] .';dbname='. $config['database'] , $config['user'], $config['pass']);
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}