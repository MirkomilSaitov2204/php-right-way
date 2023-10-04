<?php

namespace App;

class App
{

    private static DB $db;

    public function __construct(protected Router $router, protected array $request, protected array $config)
    {
            static::$db = new DB($config);

    }

    public static function db(): DB
    {
        return  static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));

        } catch (\App\Exceptions\RouteNotFoundException $e) {
            header('HTTP/1.1 404 Not Found');
            echo $e->getMessage();
        }

    }
}