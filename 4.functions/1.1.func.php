<?php 

function sayHello() {
    echo "Surprise mfer" . "<br>";
};

sayHello();

function sumNumber(...$numbers) {
    $total = 0;
    foreach($numbers as $number) {
        $total += $number;
    }
    return $total;
};

echo sumNumber(12,421,51,152,512);