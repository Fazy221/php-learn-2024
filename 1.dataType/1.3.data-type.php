<?php
// Strings
$str = "Hello";
echo $str;
echo "<br />";

// Can check vale and it's type through this debugging function
var_dump($str);
// For checking type only can also use PHP built in function
echo gettype($str); // have to echo though

// Integers
echo 6;
echo "<br />";

// Float (decimal)
echo 6.8;
echo "<br />";

// Array
$arr = ['A', 'B', 'C'];
var_dump($arr);
echo "<br />";

// Boolean
$bool = true;
var_dump($bool);


// Obj
$obj = new stdClass();

// Resource
$file = fopen('note.txt', 'r'); // 2nd arg is read method to read from note.txt
var_dump($file);
?>