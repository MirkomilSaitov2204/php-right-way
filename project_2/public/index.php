<?php

declare(strict_types=1);

use Domain\App;
use Domain\Router;
use Domain\Config;
use Domain\Controllers\HomeController;
use Domain\Controllers\TransactionController;
use Domain\Controllers\GeneratorExampleController;

require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');
define('FILE_PATH', __DIR__ . '/../storage/');

$container = new \Domain\Container();
$router = new Router($container);

$router->registerRoutesFromControllerAttributes([
    HomeController::class,
    GeneratorExampleController::class
]);


//$router->get('/', [HomeController::class, 'index']);
//$router->get('/generator', [GeneratorExampleController::class, 'index']);
//$router->get('/transactions', [TransactionController::class, 'index']);
//$router->get('/transactions/create', [TransactionController::class, 'create']);
//$router->post('/transactions/store', [TransactionController::class, 'store']);

(new App(
    $container,
    $router,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD']
    ],
    new Config($_ENV))
)->boot()->run();


//(new Domain\Models\Invoice())->create([
//    ['description' => 'Item 1', 'quantity' => 1, 'unitPrice' => 15.25],
//    ['description' => 'Item 2', 'quantity' => 2, 'unitPrice' => 2],
//    ['description' => 'Item 3', 'quantity' => 3, 'unitPrice' => 0.25],
//]);

