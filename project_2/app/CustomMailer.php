<?php

namespace Domain;

use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\RawMessage;

class CustomMailer implements MailerInterface
{
    protected Transport\TransportInterface $transport;

    public function __construct(protected string|null $dsn)
    {
        $this->transport = Transport::fromDsn($this->dsn);
    }

    public function send(RawMessage $message, Envelope $envelope = null): void
    {
        $this->transport->send($message, $envelope);
    }
}