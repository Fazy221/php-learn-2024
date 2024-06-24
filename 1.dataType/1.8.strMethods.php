<?php
$output = null;
$string = 'Hello World!';

$output = strlen($string); // know length of string
$output = str_word_count($string); // know how many words are in string which is 2 in this case
$output = strpos($string, 'World'); // since string index starts from 0, 1st arg is which string to use method on and 2nd arg is word or letter whose pos we're supposed to find
$output = $string[2]; // get specific letter by entering index which is 'l' in this case
$output = substr($string, 6, 5); // get specific word by defining range in 2nd and 3rd arg. 3rd arg starts counting after 2nd arg defined place so it's World in this case
$output = str_replace('World', 'Universe', $string); // We replace word by giving in first arg default value and in second arg change value and in third arg string on which we want to use
$output = strtolower($string); // lower case so "hello world"
$output = strtoupper($string); // upper case so "HELLO WORLD"
$output = ucwords($string); // sentence case
$output = trim("     Hello World        "); // although even without trim method, space won't show in browser but will show in source code so trim eliminates it



echo $output;
