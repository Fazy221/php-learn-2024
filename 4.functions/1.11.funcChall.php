<?php 

// Challenge 1

// Easy - Regular Function
/*
function fahrenheitToCelsius($fVal) {
    $cVal = ($fVal - 32) * 5/9;
    $cVal = number_format($cVal, 0, ".", "");
    return $cVal . '&deg;';
};
echo fahrenheitToCelsius(68);
*/

// Easy - Arrow Function
/*
$format = fn ($val) =>  number_format($val, 0, ".", "");
$fahrenheitToCelsius = fn ($fVal) =>  $format(($fVal - 32) * 5/9) . '&deg;';
echo $fahrenheitToCelsius(68);
*/

// Hard - Anonymous Function
/*
$baseTemp = 32;
function fahrenheitToCelsius() {
    return function($fVal) {
        $cVal = ($fVal - 32) * 5/9;
        $cVal = number_format($cVal, 0, ".", "");
        return $cVal . '&deg;';
    };
};
$result =  fahrenheitToCelsius();
echo $result($baseTemp) . "<br>";
*/
// Challenge 2
/*
$names = ['alex', 'elfie', 'mia', 'johny', 'sasha'];

function toUpperCaseFunc($names) {
    foreach($names as $name) {
        $randVal = $name;
        $randArr[] = strtoupper($randVal);
    };
    return $randArr;

};
print_r(toUpperCaseFunc($names));
*/
// Challenge 3
/* // My attempt, although succeeded but at the cost of using max func
function findLongestWord($sentence) {
   $senStr = explode(' ', $sentence); // Turning string "Hello World" to array ["Hello", "World] and storing in $senStr
   for($i = 0; $i < count($senStr); $i++) {
    $senLen[] = strlen($senStr[$i]); // Putting individual length of each value in seperate array and storing in $senLen [5, 11]
   }
   return max($senLen);
};
 print_r(findLongestWord('Hello mother Fucking noe'));
 */
// Through chatgpt help
function findLongestWord($sentence) {
    $senArr = explode(' ', $sentence); 
    $maxLen = 0;
    foreach($senArr as $word) {
    $wordLen = strlen($word);
    if($wordLen > $maxLen) {
        $maxLen = $wordLen;
    }
    }
    return $maxLen;
 };
  print_r(findLongestWord('Hello mother Fucking nowqeqwewqee'));