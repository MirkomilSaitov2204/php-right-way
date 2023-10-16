<?php

declare(strict_types=1);


use Domain\App;
use Domain\Config;

require_once __DIR__ . '/../../vendor/autoload.php';



$container = new \Domain\Container();

(new App($container))->boot();

$container->get(\Domain\Services\EmailService::class)->sendQueuedEmails();