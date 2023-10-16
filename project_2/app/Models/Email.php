<?php

namespace Domain\Models;

use Domain\Model;
use Symfony\Component\Mime\Address;

class Email extends Model
{
    public function queue(Address $to, Address $from, string $subject, string $html, ?string $text = null): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO emails (subject, status, html_body, text_body, meta, created_at) values (?,?,?,?,?,NOW())'
        );

        $meta['to'] = $to->toString();
        $meta['from'] = $from->toString();

        $stmt->execute([$subject, EmailStatus::Queue->value, $html, $text, json_encode($meta)]);
    }

    public function getEmailsByStatus(EmailStatus $status): array
    {
        $stmt = $this->db->prepare(
            'select * from emails where status = ?'
        );

        $stmt->execute([$status->value]);

        return $stmt->fetchAll(\PDO::FETCH_BOTH);
    }

    public function markEmailSend(int $id): void
    {
        $stmt = $this->db->prepare(
            'UPDATE emails set status = ? sent_at = NOW() where id = ?'
        );

        $stmt->execute([EmailStatus::Sent->value, $id]);
    }

}