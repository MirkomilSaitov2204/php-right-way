<?php

declare(strict_types = 1);

namespace Domain\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = '404 not Found';
}