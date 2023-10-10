<?php

declare(strict_types=1);

namespace Domain\Controllers;

use Domain\Attributes\Get;
use Domain\Attributes\Post;
use Domain\Attributes\Put;
use Domain\View;
use Domain\Services\InvoiceService;

class HomeController
{
    public function __construct(public InvoiceService $invoiceService)
    {

    }

    #[Get('/')]
    public function index(): View
    {
//        App::$container->get(InvoiceService::class)->process([], 123);
//        (new Container())->get(InvoiceService::class)->process([], 123);
        $this->invoiceService->process([], 123);

        return View::make('index');
    }

    #[Post('/', 'post')]
    public function store()
    {

    }

    #[Put('/', 'put')]
    public function update()
    {

    }
}