<?php

namespace App\Models;

use App\Model;

class Invoice extends Model
{
    public function create(float $amount, int $userId): int
    {
        $insertInvoice = 'INSERT INTO invoices (amount, user_id) values (:amount, :user_id)';

        $invoicePrepare = $this->db->prepare($insertInvoice);

         $invoicePrepare->execute([
            'amount' => $amount,
            'user_id' => $userId
        ]);

        return  (int)$this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $stmt = $this->db->prepare(
          'select invoices.id, amount, full_name from invoices left join users on users.id = user_id where invoices.id = ?'
        );
        $stmt->execute([$invoiceId]);
        $invoice = $stmt->fetch();

        return  $invoice ?? [];
    }
}