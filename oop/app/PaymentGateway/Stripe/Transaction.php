<?php

declare(strict_types=1);

namespace App\PaymentGateway\Stripe;

class Transaction
{
    private static int $count = 0;

    public int|float $amount;

    public string $description;

    public function __construct($amount, $description)
    {
        $this->amount = $amount;
        $this->description = $description;
        self::$count++;
    }

    public function process()
    {
        echo "processing stripe transaction ...";
    }

    public static function getCount(): int
    {
        return  self::$count;
    }
}