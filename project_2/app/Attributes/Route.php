<?php

declare(strict_types=1);

namespace Domain\Attributes;

#[\Attribute]
class Route implements RouteInterface
{
    public function __construct(public string $routePath, public string $method = 'get')
    {

    }
}