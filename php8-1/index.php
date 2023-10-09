<?php

declare(strict_types=1);

//$arr1 = ['a' => 1, 'b' => 2, 'c' => 3];
//$arr2 = [4, 'b' => 5, 6];

$arr1 = ['a' => 1, 2, 3, 4];
$arr2 = [5, 6, 'c'=> 7];

$arr3 = [...$arr1, ...$arr2];

print_r($arr3);