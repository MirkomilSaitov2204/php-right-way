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

    public function fetchLazy(\PDOStatement $stmt): \Generator
    {
        foreach ($stmt as $item)
            yield $item;
    }
}