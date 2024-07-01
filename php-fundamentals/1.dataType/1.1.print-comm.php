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
            <h1 class="text-3xl font-semibold"><?php echo "Learn PHP From Scratch" ?></h1> <!-- Long way of printing in html -->
            <h1 class="text-3xl font-semibold"><?= "Learn PHP From Scratch" ?></h1> <!-- Short way of printing in html as = sign replaces echo -->
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Welcome To The Course</h2>
            <!-- Can also echo html element inside string -->
            <?= '<p>In this course, you will learn the fundamentals of the PHP language</p>' ?>
        </div>
    </div>
    <!-- Can also use print in place of echo and it serves same purpose -->
    <?php print "Hello world!" ?>
    <!-- One major difference with echo is that echo can print multiple things along -->
    <?php echo 'Value One ', 'Value two ', 'Value three '; ?>
</body>

</html>

<?php
// Can comment like this
/* And like this */

// In case if don't have any html then can simply exclude out ? > ending part from end
?>