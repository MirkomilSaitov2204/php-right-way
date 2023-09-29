<?php

namespace App;

class ClassB extends ClassA
{
    public static string $name = "B";

    public static function getName()
    {
        echo self::$name;
    }
}