<?php

declare(strict_types=1);

namespace Domain\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Get extends Route
{
    public function __construct(public string $routePath)
    {
        parent::__construct($this->routePath, 'get');
    }
}