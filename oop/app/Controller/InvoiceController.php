<?php

namespace App\Controller;

use App\View;

class InvoiceController
{
    public function index(): View
    {
        return View::make('invoice/invoices');
    }

    public function create(): View
    {
        return View::make('invoice/create');
    }

    public function store()
    {
        var_dump($_POST['name']);
    }

}