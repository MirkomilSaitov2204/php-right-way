<?php

namespace Domain\Models;

enum EmailStatus: int
{
    case Queue = 0;
    case Sent = 1;

    case Failed = 2;

    public function toString(): string
    {
        return match ($this) {
            self::Queue => 'In queue',
            self::Sent => 'Send',
            self::Failed => 'Failed'
        };
    }
}