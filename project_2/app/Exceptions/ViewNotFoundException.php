<?php

declare(strict_types = 1);

namespace Domain\Exceptions;

class ViewNotFoundException extends  \Exception
{
    protected $message = 'View not found';
}