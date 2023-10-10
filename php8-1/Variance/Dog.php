<?php

declare(strict_types=1);


namespace Variance;

class Dog extends Animal
{

    public function speak()
    {
        echo $this->name . " Dog";
    }

    public function eat(Food $food)
    {
        echo $this->name . " eats " . get_class($food);
    }
}