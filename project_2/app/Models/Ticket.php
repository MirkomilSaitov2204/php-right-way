<?php

namespace Domain\Models;

use Domain\Model;

class Ticket extends Model
{
    public function all(): \Generator
    {
        $stmt = $this->db->query(
            'select * from transactions'
        );

        return $this->fetchLazy($stmt);
    }
}