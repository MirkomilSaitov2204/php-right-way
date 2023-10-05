<?php

declare(strict_types=1);

namespace Domain\Controllers;

use Domain\App;
use Domain\Container;
use Domain\Services\InvoiceService;
use Domain\View;

class HomeController
{
    public function __construct(public InvoiceService $invoiceService)
    {

    }

    public function index(): View
    {
//        App::$container->get(InvoiceService::class)->process([], 123);
//        (new Container())->get(InvoiceService::class)->process([], 123);
        $this->invoiceService->process([], 123);

        return View::make('index');
    }
}