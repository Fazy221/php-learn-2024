<?php
$favColor = 'red';

// Without null coalescing operator
$color = isset($favColor) ? $favColor : 'blue';
// With null coalescing operator
$color2 = $favColor ?? "blue";

echo $color . "<br>";
echo $color2  . "<br>";;

// Introducing another favColor 
$secFavColor = 'green';

// Without coalescing operator
$colour = isset($favColor) ? $favColor : (isset($secFavColor) ? $secFavColor : 'blue');
// With coalescing operator (much cleaner)
$colour2 = $favColor ?? $secFavColor ?? 'blue';
echo $colour . "<br>";
echo $colour2 . "<br>";
