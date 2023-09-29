<?php

namespace App\Classes;

class Invoice
{
    public function index()
    {
        return "index";
    }

    public function create()
    {
        return "<form action='/invoice/create' method='post'><input type='text' name='name'/><button type='submit'>Button</button></form>";
    }

    public function store()
    {
        var_dump($_POST['name']);
    }

}