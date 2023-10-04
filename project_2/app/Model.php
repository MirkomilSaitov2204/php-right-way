<?php

namespace Domain;

class Model
{
    /** @var DB  */
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }
}