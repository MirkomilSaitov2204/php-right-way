<?php

namespace Domain\Exceptions;

class FileNotFoundException extends  \Exception
{
    protected $message = "File not found";
}