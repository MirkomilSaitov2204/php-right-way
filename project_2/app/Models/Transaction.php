<?php

declare(strict_types=1);

namespace Domain\Models;

use Domain\Model;

class Transaction extends Model
{
    public function get(): array
    {
        $stmt = $this->db->prepare('select * from transactions');

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param array $transactions
     * @return int
     */
    public function insert(array $transactions): int
    {
        $stmt = $this->db->prepare('insert into transactions (date, check_data, description, amount) values (:date, :checkNumber, :description, :amount)');

        foreach ($transactions as $transaction){
            $stmt->execute([
                'date' => date('Y-m-d H:i:s', strtotime($transaction['date'])),
                'checkNumber' => $transaction['checkNumber'],
                'description' => $transaction['description'],
                'amount' => $transaction['amount'],
            ]);
        }

        return (int) $this->db->lastInsertId();
    }
}