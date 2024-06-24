<?php

$output = null;
$output = date('Y'); // 2024
$output = date('Y', 936345600); // 1990 - // Date method is number of milliseconds passed since 1970. We can get year from timestamp
$output = date('Y', strtotime('1990-09-01')); // Can also get timesuse string method
$output = date('m'); // 11 - Get month
$output = date('D'); // Mon - Get day
$output = date('l'); // Monday - Get full day
$output = date('Y-m-d'); // 2024-06-17 - Get full date
$output = date('m-d-Y'); // 06-17-2024 - Get full date with diff format
$output = date('h'); // Get hour
$output = date('i'); // get min
$output = date('s'); // get sec
$output = date('a'); // get am/pm
$output = date('Y-m-d h:i:s a')

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
            <?php echo $output; ?>
        </div>
    </div>
</body>

</html>