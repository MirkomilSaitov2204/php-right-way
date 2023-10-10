<?php

declare(strict_types=1);

namespace Domain\Attributes;

#[\Attribute]
class Put extends Route
{
    public function __construct(public string $routePath)
    {
        parent::__construct($this->routePath, 'put');
    }
}