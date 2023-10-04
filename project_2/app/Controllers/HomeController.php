<?php

declare(strict_types=1);

namespace Domain\Controllers;

use Domain\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }
}