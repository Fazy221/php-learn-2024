<?php
$output = null;
$fruits = [
    ['Apple', 'Red'],
    ['Orange', 'Orange'],
    ['Banana', 'Yellow']
];
$output = $fruits[0][0];
$fruits[] = ['Grape', 'Purple']; // When you use $fruits[], PHP understands that you want to append an element to the array. Without [], php will just overwrite
// array_push($fruits, ['Grape', 'Purple']); // alternative
$users = [
    ['name' => 'Faizan', 'email' => 'faizan@gmail.com', 'password' => '123456'],
    ['name' => 'Raza', 'email' => 'raza@gmail.com', 'password' => '123456'],
    ['name' => 'Taha', 'email' => 'taha@gmail.com', 'password' => '123456']
];
$output = $users[1]['name']; // will give us it's value
$users[] = ['name' => 'Fazy', 'email' => 'fazy@gmail.com', 'password' => '123456'];
array_push($users, ['name' => 'Azlan', 'email' => 'azlan@gmail.com', 'password' => '123456']); // alternative
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Learn PHP From Scratch</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold"><?= "Learn PHP From Scratch" ?></h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Output -->
            <?= $output ?>
            <p>
            <pre>
                <?php print_r($fruits) ?>
            </pre>
            </p>
        </div>
    </div>
</body>

</html>