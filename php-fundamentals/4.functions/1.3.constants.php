<?php

// Constants are part of PHP program to define things that won't ever change and unlike js, they're mostly used in config files like php version and db program

// First way using define method
define("APP_NAME", "My App"); // First arg is variable and second is value. Don't need to use $ with variable
define("APP_VERSION", "1.0.0"); // It's a convention to use variable in uppercase

echo APP_NAME;
echo APP_VERSION . "<br>";


// Second way (prev used with classes but now available in global scope too)
const DB_NAME = "mydb";
const DB_HOST = "localhost";

// We can access constants in any scope like local scope of function
function run() {
    echo APP_NAME;
    echo DB_NAME;
    echo DB_HOST;
};
run();