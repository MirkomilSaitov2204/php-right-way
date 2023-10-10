<?php

declare(strict_types=1);


namespace Variance;

class Cat extends Animal
{

    public function speak()
    {
        echo $this->name . " Meow";
    }


    public function eat(Food $food)
    {
        echo $this->name . " eats " . get_class($food);
    }
}