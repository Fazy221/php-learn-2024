<?php
$output = null;

// Similar to JS object literals and dictioneries in python with key/value pairs, we've associated arrays in php
$users = [
    // 0 => 'One', // instead of index as key, we can use anything else
    'name' => 'Faizan',
    'email' => 'faizanraza2221@gmail.com',
    'password' => '213412412',
    'hobbies' => ['Programming', 'Language Learning'],
];
// echo $users; // just like regular arrays, we can't echo users so we'll print_r instead in html

$output = $users['name']; // getting value by entering specific key
$output = $users['email'];
// $output = $users['email2']; // if try getting access to el which don't exist then it'll give off err
$output = $users['hobbies'][0]; // To get access to nested el like value of arr then enter arr key name then index next to brackets
$output = $users['address'] = '134 Main St'; // Can add value to key in arr. If key don't exist then new will be made automatically
unset($users['address']); // can remove from arr as well by entering key
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
            <h2 class="font-semibold text-xl my-4">User Array: </h2>
            <p>
            <pre>
                    <?php print_r($users); ?>
                </pre>
            </p>
        </div>
    </div>
</body>

</html>