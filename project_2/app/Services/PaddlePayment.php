<?php

namespace Domain\Services;

use Domain\Interfaces\PaymentGatewayInterface;

class PaddlePayment implements PaymentGatewayInterface
{

    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'Paddle payment gateway </br>';

        return  true;
    }
}