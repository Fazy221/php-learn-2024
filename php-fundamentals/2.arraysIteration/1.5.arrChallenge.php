<?php
// Challenge 1: Sum of an array
$arr = [1, 2, 3, 4, 5];
$sum = $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4];
echo 'The sum of ' . count($arr) . ' number is: ' . $sum . '<br />';

// Challenge 2: Colors array
$colors = ['red', 'blue', 'green', 'yellow'];
$colors = array_reverse($colors);
array_push($colors, 'purple', 'orange');
array_splice($colors, 1, 1, 'pink');
array_pop($colors);

// Challenge 3: Job Listing Array
$job_listing = [
    ['id' => 0, 'job_title' => 'UI/UX Designer', 'company' => 'Yonasi Private Limited', 'contact_email' => 'yonasi@gmail.com', 'contact_phone' => '+923211234567', 'skills' => ['Javascript', 'HTML', 'CSS', 'PHP', 'UI/UX Design']],
    ['id' => 1, 'job_title' => 'UI/UX Designer', 'company' => 'Knovatec', 'contact_email' => 'knovatec@gmail.com', 'contact_phone' => '+9112152153', 'skills' => ['Python', 'Django', 'SQA', 'Testing', 'Programming']]
];
array_push($job_listing, ['id' => 2, 'job_title' => 'Frontend Developer', 'company' => 'Nearpeer', 'contact_email' => 'nearpeer@gmail.com', 'contact_phone' => '+92321987642', 'skills' => ['Vue Js', 'UI/UX', 'Edtech', 'HTML', 'Illustration']]);
echo $job_listing[1]['job_title'];
echo $job_listing[2]['skills'][0];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>
    <pre>
        <?php print_r($colors) ?>
    </pre>
    </p>
    <p>
    <pre>
        <?php print_r($job_listing) ?>
    </pre>
    </p>
</body>

</html>