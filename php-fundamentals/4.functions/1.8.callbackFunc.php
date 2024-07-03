<?php

$numbers = [1, 42, 51, 98, 23];

/*
$sqrNum = array_map(function ($number) {
  return $number * $number;
}, $numbers);
*/

// As we've to write whole func in array_map, can just use callback func instead to process logic although array_map is built in func so we won't see internal implementation. 
$sqr = function($number) {
  return $number * $number;
};
$sqrNum = array_map($sqr, $numbers);
print_r($sqrNum);

// Building custom func which use callback func
$applyCallback = function($callback, $value) {
  return $callback($value);
};
$doubleVal = function($value) {
  return $value * $value;
};
$result = $applyCallback($doubleVal, 5); 
echo $result;
?>

<!-- It's the same as doing map method in javascript -->
<script>
  // /*
  const numbers = [1,42,51,98,23];
  const sqrNum = numbers.map((number)=> {
    return number * number;
  })
  console.log(sqrNum);

  // Doing callback in just for my own practice
  const applyCallbackFunc = (callback, value) => {
    return callback(value);
  };
  const doubleVal = (value) => {
    return value * value;
  };
  const result = applyCallbackFunc(doubleVal, 5);
  console.log(result);

  // */
</script>