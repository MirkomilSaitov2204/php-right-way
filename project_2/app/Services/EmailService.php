<?php

declare(strict_types = 1);

namespace Domain\Services;

use Domain\Models\Email;
use Domain\Models\EmailStatus;
use Symfony\Component\Mailer\MailerInterface;

class EmailService
{
    public function __construct(protected Email $email, protected MailerInterface $mailer)
    {
    }

    public function sendQueuedEmails(): void
    {
        $emails = $this->email->getEmailsByStatus(EmailStatus::Queue);

        foreach ($emails as $email){
            $meta = json_decode($email->meta, true);

            $emailMessage = (new \Symfony\Component\Mime\Email())
                ->from($meta['from'])
                ->to($meta['to'])
                ->subject($email->subject)
                ->attach('Hello world', 'welcome.txt')
                ->text($email->text_body)
                ->html($email->html_body);

            $this->mailer->send($emailMessage);

            $this->email->markEmailSend($email->id);
        }
    }

}
