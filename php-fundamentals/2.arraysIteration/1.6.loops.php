<?php
// For Loop
// for ($i = 0; $i <= 10; $i++) {
//     echo $i . '<br/>';
// }

// While Loop
// $i = 0;
// while ($i <= 10) {
//     echo $i . '<br />';
//     $i++;
// };

// Do While Loop (will first run then check. If put 12 then it'll print first then check condition)
// $i = 0;
// do {
//     echo $i . '<br />';
//     $i++;
// } while ($i <= 10);
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
            <!-- For Loop in HTML -->
            <?php for ($i = 0; $i <= 10; $i++) : ?>
                <li><?= "Number: $i" ?></li>
            <?php endfor; ?>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- While Loop in HTML (less preferred acc to instructor) -->
            <?php $i = 0; while($i <= 10) : ?>
                <li><?= "Number: $i"; $i++ ?></li>
            <?php endwhile; ?>
        </div>
        <!-- Do loop in HTML (almost never used) -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <?php $i = 0; do { ?>
                <li> <?= "Number: $i" ?> </li>
            <?php $i++; } while($i <= 10) ?>
        </div>
    </div>
</body>

</html>