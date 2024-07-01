<?php

/*
String Manipulation:
    Write code that takes a user's full name (entered as a string) and separates it into first and last name.
        Use strpos and substr functions to achieve this
*/
$fullName = 'Faizan Raza';
$firstName = substr($fullName, strpos($fullName, 0), strpos($fullName, ' '));
$lastName = substr($fullName, strpos($fullName, ' '), strlen($fullName));
// echo $firstName . '<br />';
// echo $lastName;
