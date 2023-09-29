<?php
declare(strict_types=1);

/* Data types and type casting */

//scalar ,compound special types

/*
 * Scalar type
 *      bool
 *      int
 *      float
 *      string
 *
 * Compound type
 *      array
 *      object
 *      callable
 *      iterable
 *
 * Special types
 *      resource
 *      null
 */

/**
function remove_element($element, $array){
//    $index = array_search($element, $array);
//
//    if ($index !== false) unset($array[$index]);
//
//    return array_values($array);

    return  array_values(array_filter($array, fn($n) => $n != $element));
}


$array = ["A", "B", "C", "D"];
$array = remove_element("Y", $array);
print_r($array);
*/


/**
 // type casting
//$a = (int)"5";
//var_dump($a);
//
//// type hinting
//function sum(float $x, float $y){
//    return $x + $y;
//}
//
//$sum = sum(2.1,4.33);
//
//echo $sum;


*/