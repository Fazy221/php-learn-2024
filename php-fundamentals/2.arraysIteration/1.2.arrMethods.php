<?php
$output = null;

$ids = [10, 44, 14, 65, 23, 13];
$users = ['user3', 'user1', 'user2'];

// $output = count($ids); // will start counting from 1 instead of 0 to get accurate counting 

// Below will be arr methods which manipulate existing arrays
$output = sort($ids); // if [5,3,7] then it'll change to [3,5,7]
$output = sort($users); // if ['user3', 'user1', 'user2'] then it'll change to ['user1', 'user2', 'user3']
// rsort does same thing but in reverse
$output = rsort($ids);
$output = rsort($users);
// Push at end of arr similar to js method (even if sort/rsort applied, it'll just push at end)
array_push($ids, 4);
array_push($users, 'user4');
// pop
array_pop($ids);
array_pop($users);
// shift
array_shift($ids);
array_shift($users);
// unshift
array_unshift($ids, 2);
array_unshift($users, 'user3');

// slice method is similar to DSA's get method on LinkedList but we also have option to return range of values instead of single value. Splice meanwhile is similar to remove method in LinkedList

// slice (return part of arr as new arr instead of manipulating original one)
$ids2 = array_slice($ids, 2, 3); // it's kinda odd but in 2nd arg, we want to start slicing from 2nd index then in 3rd arg, we say to start slicing given index which is 2 and it'll count as 1st step then move one by one to next. As we gave 3 so it'll move 2 steps further 
// var_dump($ids2);

// splice (take position in array then take how many el to remove and last argument is taken to place at position where previous el were removed)
// array_splice($ids, 1, 2, 100); // As given position is one so in [10, 44, 14, 65, 23, 13] it's 44 then 3rd arg is to remove how many el which is 2 there so remove 44 & 14 then last arg is value to replace which is 100 in this case
array_splice($ids, 1, 1, 100); // As given position is 1 so 44 and el to remove is also 1 so 44 only gets eliminated then last arg is 100 which mean to add 100 in this position
array_splice($users, 0, 1, 'New User'); // As given position is 0 so "user3" and el to remove is 1 so "user3" be removed and last arg is "New User" which'll replace position "user3"

$output = 'Sum of IDs: ' . array_sum($ids); // array_sum (similar to reduce method in js; will add up all number values)
$output = 'User 2 is at index: ' . array_search('user2', $users); // will search value in array
$output = 'User 3 exists at: ' . in_array('user3', $users); // will check if given value exist in arr or not.
// var_dump(in_array('user3', $users)); // If exist then it returns 1 otherwise 0. 

// Explode (turn str to arr)
$tags = "games,tech,programming";
$tagsArr = explode(',', $tags); // first arg is seperator which is "," in this case & 2nd arg is variable to apply to
// var_dump($tagsArr);
// Implode (turn arr to str)
$output = implode(', ', $users); // first arg is content to seperate array values with which is comma and space in this case
// var_dump($output);


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
            <p> <?= $output ?> </p>
            <h2 class="text-xl font-semibold my-4">IDs Array: </h2>
            <p>
            <pre>
                    <?php print_r($ids); ?>
                </pre>
            </p>
            <h2 class="text-xl font-semibold my-4">Users Array:</h2>
            <p>
            <pre>
                    <?php print_r($users) ?>
                </pre>
            </p>
        </div>
    </div>
</body>

</html>
