<!DOCTYPE html>
<html lang="en">
<?php
$num1 = 10;
$num2 = 20;
$output = null;

// Basic Math
$output = "$num1 + $num2 = " . $num1 + $num2; // Add
$output = "$num1 - $num2 = " . $num1 - $num2; // Sub
$output = "$num1 * $num2 = " . $num1 * $num2; // Multiply
$output = "$num1 / $num2 = " . $num1 / $num2; // Divide
$output = "$num1 %   $num2 = " . $num1 % $num2; // Module

// Assignment operators
$num3 = 20;
// $num3 = $num3 + 20;
$num3 += 20; // Shorthand
$num3 -= 20;
$num3 *= 20;
$num3 /= 2;
// $output = $num3;

// Built In PHP Functions
$output = rand(); // insert random int
$output = getrandmax(); // old php func 
$output = rand(0, 10); // get random value between given values
$output = round(2.5); // round up / down around based on if below/equal or above 4
$output = ceil(4.2); // round up so 5
$output = floor(4.8); // round down so 4
$output = sqrt(64); // 8 as square root
$output = pi(); // 3.1415926535898
$output = abs(-3.4); // turn positive from negative
$output = max(1, 2, 50); // get highest value so 50; can also use with array: max([1,2,50])
$output = min([3, 4, 2]); // 2 as min
$output = number_format(1784230.42149, 2, '.', ','); // recent and currency formatter so result will be "1,784,230.42". Second arg is how many values to keep after dec, 3rd arg is what defines dec point which is "." there and last arg is seperator which is "," in this case



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Learn PHP From Scratch</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
     x   <div class="container mx-auto">
            <h1 class="text-3xl font-semibold"><?= "Learn PHP From Scratch" ?></h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Output -->
            <?= $output ?>
        </div>
    </div>
</body>

</html>