<?php

namespace Domain;

/**
 * @property-read ?array $mailer
 */
class Config
{
    /** @var array|array[]  */
    protected array $config = [];

    /**
     * @param array $env
     */
    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host'     => $env['DB_HOST'],
                'user'     => $env['DB_USER'],
                'pass'     => $env['DB_PASS'],
                'database' => $env['DB_DATABASE'],
                'driver'   => $env['DB_DRIVER'] ?? 'pdo_mysql',
            ],
            'mailer' => [
                'dsn'     => $env['MAILER_DSN'] ?? 'smtp',
            ]
        ];
    }

    /**
     * @param string $name
     * @return array|mixed|null
     */
    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}