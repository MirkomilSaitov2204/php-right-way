<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $full_name, string $email, bool $isActive, $createdAt): int
    {
        $userInsert = 'INSERT INTO users (email, full_name, is_active, created_at) values (:email, :name, :active, :date)';

        $userPrepare = $this->db->prepare($userInsert);

        $userPrepare->execute([
            'name' => $full_name,
            'email' => $email,
            'active' => $isActive,
            'date' => $createdAt
        ]);

        return (int)$this->db->lastInsertId();
    }
}