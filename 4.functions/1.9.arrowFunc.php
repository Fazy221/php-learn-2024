<?php 

$add = fn ($a, $b) => $a + $b; // we can't wrap inside and use return like in js and we can't use more than 1 line. These are just for really small helper func
echo $add(1,2) . "<br>";

// Using arrow func in prev video's array map method
$numbers = [1,3,5,6];
// Method #1 Doing directly
// $sqrNumbers = array_map(fn ($number) => $number * $number, $numbers); 
// Method #2 Passing in
$sqrNum = fn ($number) => $number * $number;
$sqrNumbers = array_map($sqrNum , $numbers ); 
print_r($sqrNumbers) . "<br>";
// Using arrow func in prev video's callback method
$callbackFunc = fn ($cb, $val) => $cb($val);
$doubleVal = fn ($val) => $val * $val;
$result = $callbackFunc($doubleVal, 4);
echo $result;
?>


<script>
  // Difference with javascript
  const add = (a, b) => a + b;
</script>