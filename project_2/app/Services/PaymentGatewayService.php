<?php

declare(strict_types = 1);

namespace Domain\Services;

use Domain\Interfaces\PaymentGatewayInterface;

class PaymentGatewayService implements PaymentGatewayInterface
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
//        sleep(1);

//        return (bool) mt_rand(0, 1);
        return true;
    }
}
