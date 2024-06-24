<?php

/*
  Challenge 1: Create a multiplication table using a nested `for` loop. The table should look like this:

1 x 1 = 1
1 x 2 = 2
1 x 3 = 3
1 x 4 = 4
1 x 5 = 5
1 x 6 = 6
1 x 7 = 7
1 x 8 = 8
1 x 9 = 9
1 x 10 = 10
2 x 1 = 2
2 x 2 = 4
2 x 3 = 6
2 x 4 = 8
... 
10 x 10 = 100
*/
echo '<h3>Multiplication Table</h3>';

for ($num = 1; $num <= 10; $num++) {
    for ($mul = 1; $mul <= 10; $mul++) {
        echo "$num x $mul = " . $num * $mul . '<br />';
    }
    echo '<br />';
}


/*
  Challenge 2: Get the sum of the numbers in an array by using a foreach loop. For bonus points, also use a for loop.
*/

echo '<h3>Array Sum</h3>';
// Foreach Loop
$numbers = [1, 2, 3, 4, 5];

$val = 0;
foreach ($numbers as $num) {
    $val = $val + $num;
};
echo $val . '<br/>';

// For Loop
$val2 = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $val2 = $val2 + $numbers[$i];
}
echo $val2  . '<br />';

/*
  Challenge 3: Calculate the average students grade from an array of students. Each student has their own array with the key 'grades'. 

  	1. Create an array of students with their names and grades (0 - 100)
	2. Iterate over the students array with a foreach loop
	3. Calculate the average grade for each student
*/
echo '<h3>Average Grade</h3>';


/* $students = [
    ["name" => 'Ashraf', "grade" => 0],
    ["name" => 'Ghuman', "grade" => 42],
    ["name" => 'Basit', "grade" => 69],
    ["name" => 'Momin', "grade" => 92],
];
$sum = 0;
foreach ($students as $student) {
    $sum = $sum + $student['grade'];
}
$avg = $sum / count($students);
echo $avg . '<br />';
*/
$students = [
    ["name" => 'Ashraf', "grade" => [10, 24, 49, 96, 42]],
    ["name" => 'Ghuman', "grade" => [42, 65, 51, 96, 52]],
    ["name" => 'Basit', "grade" => [69, 26, 16, 61, 24]],
    ["name" => 'Momin', "grade" => [92, 61, 75, 72, 24]]
];
foreach ($students as $student) {
    $sum = array_sum($student["grade"]);
    $avg = $sum/count($student["grade"]);
    echo $student["name"] . ": " . $avg . "<br/>";
}
// $avg = $sum/count($students);
// echo $avg;