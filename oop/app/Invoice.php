<?php

declare(strict_types=1);

namespace App;


class Invoice
{
//    protected array $data = [];

//    protected function process(float $amount, $description){
//        var_dump($amount, $description);
//    }
//
//    public function __call(string $name, array $arguments)
//    {
//        if (method_exists($this, $name))
//            call_user_func_array([$this, $name], $arguments);
//    }
//
//    public static function __callStatic(string $name, array $arguments)
//    {
//        var_dump($name, $arguments);
//    }

//    public function __get(string $name)
//    {
//        if (array_key_exists($name, $this->data))
//            return $this->data[$name];
//        return  null;
//    }
//
//    public function __set(string $name, $value): void
//    {
//        $this->data[$name] = $value;
//    }
//
//    public function __isset(string $name): bool
//    {
//        return  array_key_exists($name, $this->data);
//    }
//
//    public function __unset(string $name): void
//    {
//        unset($this->data[$name]);
//    }

//    public function __toString(): string
//    {
//        return  "hello";
//    }

//    public function __invoke()
//    {
//        var_dump("invoked");
//    }

//    public $id;
//    public function __construct()
//    {
//        $this->id = uniqid('_invoce_');
//    }
//
//    public function __serialize(): array
//    {
//        return  [
//            'id' => $this->id
//        ];
//    }
//
//    public function __unserialize(array $data): void
//    {
//        $this->id = '123';
//    }

    public function __construct(public Customer $customer)
    {

    }

    public function process(float $amount): void
    {
        if ($amount <= 0 )
            throw new \InvalidArgumentException('Invalid invoice amount');
        if (empty($this->customer->getBillingInfo()))
            throw new  MissingBillingException();

        echo "Processing $" . $amount . "invoice - ";

        sleep(1);

        echo "OK" . PHP_EOL;

    }
}