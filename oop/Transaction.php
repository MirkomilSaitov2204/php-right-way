<?php

declare(strict_types=1);

class Transaction
{

    private float $amount = 0;
    private string $description;

    private ?Customer $customer =  null;


    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function addTax(float $rate): Transaction
    {

        $this->amount +=$this->amount * $rate / 100;
        return $this;
    }

    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;
        return  $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

}

