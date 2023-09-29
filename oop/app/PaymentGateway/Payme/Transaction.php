<?php

namespace App\PaymentGateway\Payme;

class Transaction
{
    public float $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

//    public function setAmount($amount)
//    {
//        $this->amount = $amount;
//    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function process()
    {
        echo "Processing " . $this->sendEmail();
    }


    public function call()
    {
        echo "213";
    }
    private function sendEmail(): bool {
        return  true;
    }
}