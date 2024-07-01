<?php

// If/else in while loop
$num = 1;
while ($num <= 10) {
    if ($num % 2 == 0) {
        echo 'Number ' . $num . ' is even' . '<br>';
    } else {
        echo 'Number ' . $num . ' is odd' . '<br>';
    }
    $num++;
};

// Break out of loop
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break;
    };
    echo $i . "<br>";
}

// Skip and continue 
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        continue; // this will skip out 5
    };
    echo $i . "<br>";
}

// Foreach loop with condition
$students = array(
    'Jill' => 74,
    'Faizan' => 100,
    'Meo' => 23,
    "Ahmd" => 14,
);
foreach ($students as $name => $grade) {
    if ($grade >= 90) {
        echo "Excellent grade " . $name . "<br>";
    } else if ($grade >= 50) {
        echo "Average grade " . $name . "<br>";
    } else {
        echo "Die the f out " . $name . "<br>";
    }
}
