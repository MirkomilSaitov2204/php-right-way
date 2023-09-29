<?php

//declare(strict_types=1);
namespace App;

class Customer
{
//    public $name;
//
//    private ?PaymentProfile $paymentProfile = null;
//
//    /**
//     * @return PaymentProfile|null
//     */
//    public function getPaymentProfile(): ?PaymentProfile
//    {
//        return $this->paymentProfile;
//    }


    public function __construct(private array $billingInfo = [])
    {
    }

    public function getBillingInfo(): array
    {
        return $this->billingInfo;
    }

}