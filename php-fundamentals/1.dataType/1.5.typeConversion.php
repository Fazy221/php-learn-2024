<?php


// Implicit Type Casting (aka type casting juggling in which php automatically convert in bg)
$number1 = 5;
$number2 = 10;
$number3 = '20';
$fruit = 'apple';
$bool1 = true;
$bool2 = false;
$null = null;

$result = $number1 + $number2; // 15
$result = $number1 + $number3; // 25 as php automatically converts str to int in bg
$result = $number3 + $number3; // 40 - str to int 
$result = $number1 . $number2; // 510 - int to str conversion as . is string concatenation method
// $result = $number1 + $fruit // Error as int + alphabetical string
$result = $number1 + $bool1; // 6 as $bool1 is true which is considered 1 so bool convert to int
$result = $number1 + $bool2; // 5 as $bool2 is false which is considered 0 so bool convert to int
$result = $number1 + $null; // 5 as $null is equal to 0 when converted to int

// var_dump($result);


// Explicit Typecasting (We tell php manually to convert X to Y)
$result = (string) $number1;
$result = (int) $number3;
$result = (bool) $number1; // as number1 is 5 so bool true but if number0 then bool will be false


var_dump($result);
