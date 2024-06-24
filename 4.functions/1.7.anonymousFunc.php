<?php 

// Anonymous functions (Don't have naming convention and use ; in end. Can be storing in variables to later use or in callback func)
$square = function ($num) {
  return $num * $num;
};
// 1. Calling func directly after storing inside a variable to later use value which was received during invokation
$result = $square(5); 
echo 'Result of square of 5 is ' . $result . "<br>";
// 2. Storing in variable without calling inside and instead, doing it later (wasn't told by instructor though)
$result2 = $square; 
echo 'Result of square of 5 is ' . $result2(5) . "<br>";

// Closures (functions residing in other function don't have access to parent func scope like js so we get around that)
function counterFunc() {
  $count = 0;
  $countCalc = function () use(&$count) { // will use "use(&variableNameToPullFromParentScope)" It's used in place of global $name when working with anonymous / arrow function
    return ++$count; // return on second invokation and add to count everytime when called
  };
  return $countCalc; // return above anonymous func on first invokation

  // Can also do it in below way without storing in variable (not told by instructor though)
  /*
  return function () use(&$count) { 
    return ++$count; 
  };;
  */
};

$count = counterFunc();
echo 'Count is ' . $count() . "<br>";
echo 'Count is ' . $count() . "<br>";
echo 'Count is ' . $count() . "<br>";
echo 'Count is ' . $count() . "<br>";

