<?php
$names = array('John', 'Jack', 'Maklova'); // Arr Method 1
$number = [1, 4, 6]; // Arr Method 2 (more preferred)

// Inspect function to format var_dump code nicely by wrapping it inside pre tag
function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die(); // this will elimate any html code in aftermath 
}
// inspect($number);
// print_r($names); // Another format method

// echo $number; // Error as can't print out whole arr
// echo $names[1]; // Can print out value on specific index

// Adding el to arr
// echo $names[3] = 'Smith'; // since it ends at index 2 so will use 3 to place new value
// echo $names[] = 'Smith'; // even if don't know length of arr then simply don't insert anything and it'll automatically add in end
// inspect($names);

// Change value at specific index
// $number[1] = 24;
// inspect($number);

// Remove value at specific index using index method
unset($number[1]);
$number = array_values($number); // index is also gone in removal case so have to reformat
inspect($number);
