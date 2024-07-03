<?php

// Global scope
$name = 'Alice';
// echo $name;


// Local scope 
$sayHello = function() use(&$name) 
{
    // return $name; // Error bcuz unlike javascript, we don't have lexical scoping which mean we func can't get access to variables from parent scope

    // Can either pass variable from global scope as parameter or use $global although that'll change value in parent scope too after func invokation
    global $name;
    $name = 'Bob';
    return $name;
};

// Before func invokation // alice
echo $name . "<br>";
// After func invokation // bob
sayHello();
echo $name;

// Same as js, we can't get access to variables defined inside function's local scope from outside scope

