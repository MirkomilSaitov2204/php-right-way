<?php

namespace Domain\Interfaces;

interface PaymentGatewayInterface
{
    public function charge(array $customer, float $amount, float $tax): bool;

}