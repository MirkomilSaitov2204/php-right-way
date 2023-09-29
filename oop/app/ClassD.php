<?php

namespace App;

/**
 * @property int $x;
 *
 * @method static int foo(string $x)
 */
class ClassD
{

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement __call() method.
    }

    public static function __callStatic(string $name, array $arguments)
    {
        // TODO: Implement __callStatic() method.
    }

    /** @var \Customer */
    private \Customer $customers;

    /** @var float */
    private float $amount;


    /**
     * Some description
     *
     * @param \Customer $customer
     * @param float|int $amount
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     *
     * @return bool
     */
    public function process(\Customer $customer, float|int $amount):bool
    {
        return true;
    }

    /**
     * @param \Customer[] $arr
     * @return void
     */
    public function foo(array $arr)
    {
        /** @var \Customer $obj */
        foreach ($arr as $obj){
            $obj->name;
        }

    }

}