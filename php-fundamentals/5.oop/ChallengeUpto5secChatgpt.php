<?php 

// Challenge 1 
/*
  Task: Create a PHP script that:
        Takes a string input from the user.
        Reverses the string and prints it.
        Converts the string to an array of characters.
        Sorts the array in alphabetical order and prints it.

*/
 function strModifer($str) {
    $str = strrev($str);
    $str = explode(' ', $str); 
    // $str = asort($str); // Don't know why it returns a boolean and what am I supposed to do with it
    return $str;
 };

$str = 'Faizan Raza';
// print_r(strModifer($str));

// Challenge 2
/*
Task: Create a PHP script that:
        Creates an associative array to store student names and their scores in different subjects (e.g., Math, Science, English).
        Calculates the average score for each student and stores it in the array.
        Prints the name of the student with the highest average score.
*/
$students = [
    ["name"=> 'Faizan', "grades" => [32, 42, 100, 100, 21]],
    ["name"=> 'Ansa', "grades" => [24, 99, 54, 92, 45]],
    ["name"=> 'Azlan', "grades" => [54, 100, 32, 54, 10]]
];
$maxMarks = 0;
foreach($students as $student) {
    $totalGrades = array_sum($student["grades"]);
    $totalSubjects = count($student["grades"]);
    $averageCalc = $totalGrades/$totalSubjects;
    echo $student["name"] . ' got an average of ' . $averageCalc . '% marks out of 100%' . "<br>"; 
    if($averageCalc > $maxMarks) {
        $maxMarks = $averageCalc;
    } else {
        echo $student["name"] . " got the highest avg score of " . $maxMarks . '!' . '<br>';
    }
};

// Challenge 3
/*
Task: Create a PHP script that:
        Generates a list of 10 random numbers between 1 and 100.
        Iterates through the list and prints whether each number is even or odd using if-else statements.
*/
$randNumsArr = [];
for($i = 1; $i <= 10; $i++) {
    $randNumsArr[] = random_int($i, 100);
};
//  print_r($randNumsArr);

 $even = 0;
 $odd = 0;
 for($i = 0; $i <= count($randNumsArr); $i++) {
    if($i % 2 === 0) {
     $even += 1;   
    } else {
        $odd += 1;
    }
 }
 echo 'Total even numbers in random numbers array are ' . $even . ' and total odd numbers are ' . $odd;
 echo "<br>";

//  Challenge 4 
/*
Task: Create a PHP script that:
        Defines a function to calculate the factorial of a number.
        Uses a closure to calculate the factorial of numbers in an array and prints the results.
*/
function calcFactorial() {
    return function($num) { // Anonymous func 
        for($i = $num; $i > 0; $i--) { // Loop in reverse to keep going until reach 0
            if($i > 0) $arr[] = $i; // Condition to keep pushing substracting number to array until reach 0
        }
        return array_product($arr); // Returning array with values multiplied with each other as one unit
    };
}
$calcFac = calcFactorial(); // Since anonymous func so saving returning func after invokation in a variable to later call
var_dump($calcFac(3));
echo "<br>";

// Challenge 5
/*
Task: Create a PHP class called Car that:
        Has properties for make, model, and year.
        Includes a constructor to initialize these properties.
        Defines a method to display the car's details.
        Creates an instance of the Car class and calls the method to display its details.
*/
class Car {
    public $make;
    public $model;
    public $year;
    function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    function displayCarDetail() {
        echo "This is " . $this->make . ", a model popular by the name of " . $this->model . " and was released in year " . $this->year;
    }
}
$toyota = new Car("Toyota", "Grande", 2008);
$toyota->displayCarDetail();
echo "<br>";
// Challenge 6 
/*
Task: Create a PHP script that:
        Defines an array of colors.
        Iterates through the array and displays each color as a colored div in HTML.
        Uses if-else statements to apply a special CSS class to a specific color (e.g., "red").
*/
function genRandColor() {
        
    for($i = 1; $i <= 3; $i++) {
            $randColor = rand(1, 255);
            $randColorArr[] = $randColor;
        }
    return implode(",", $randColorArr);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    div {
        width:20px;
        height:20px;
        margin:10px;
    }
</style>
</head>
<body>
<?php
    for($i = 0; $i <= 2; $i++){
        $randColorArr = genRandColor();
        echo "<div style='background-color:rgb($randColorArr)'> </div>";
    }
    ?>
</body>
</html>

