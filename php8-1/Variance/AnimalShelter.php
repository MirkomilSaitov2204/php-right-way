<?php

declare(strict_types=1);


namespace Variance;

interface AnimalShelter
{
    public function adopt(string $name): Animal;
}