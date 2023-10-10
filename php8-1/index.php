<?php

declare(strict_types=1);

//$arr1 = ['a' => 1, 'b' => 2, 'c' => 3];
//$arr2 = [4, 'b' => 5, 6];

//$arr1 = ['a' => 1, 2, 3, 4];
//$arr2 = [5, 6, 'c'=> 7];
//
//$arr3 = [...$arr1, ...$arr2];
//
//print_r($arr3);


//function foo(): never
//{
//    echo 1;
//    exit();
//}
//
//foo();
//
//echo "I shoud never be printed";
require_once __DIR__ . '/vendor/autoload.php';


$kitty = (new Variance\CatShelter())->adopt("Ricky");
$kitty->speak();
echo PHP_EOL;

$doggy = (new Variance\DogShelter())->adopt("Marvick");
$doggy->speak();
echo PHP_EOL;

$catFood = new Variance\AnimalFood();
$kitty->eat($catFood);
echo PHP_EOL;

$banana = new Variance\Food();
$doggy->eat($banana);