<?php

declare(strict_types=1);

use Domain\App;
use Domain\Controllers\TransactionController;
use Domain\Router;
use Domain\Config;
use Domain\Controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');
define('FILE_PATH', __DIR__ . '/../storage/');


$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/transactions', [TransactionController::class, 'index']);
$router->get('/transactions/create', [TransactionController::class, 'create']);
$router->post('/transactions/store', [TransactionController::class, 'store']);

(new App($router, ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']], new Config($_ENV)))->run();