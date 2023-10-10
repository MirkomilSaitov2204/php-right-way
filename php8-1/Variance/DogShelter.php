<?php

declare(strict_types=1);


namespace Variance;

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog
    {
        return new Dog($name);
    }
}