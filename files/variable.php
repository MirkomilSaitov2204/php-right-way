<?php

/**

// Const



define('NAME', 'value');

echo defined('NAME');

echo NAME;

if (true){
//    const A = 1; // const defines at compile time, we can not use conditional blocks
    define('VALUE', 1); // define() define in run time
}

$paid = 'PAID';

define('STATUS_'.$paid, 4);

echo STATUS_PAID;


/// magic const __LINE__

echo __LINE__;

// variable variables
$foo = 'bar';
$$foo = 'baz';

echo $bar;

 */