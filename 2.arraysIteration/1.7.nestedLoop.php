<?php
$output = null;
for ($set = 1; $set <= 3; $set++) {
    echo "---> Set $set started! <--- <br/>";
    for ($rep = 1; $rep <= 12; $rep++) {
        echo "Rep $rep done! <br/>";
    }
}
$set = 1;
$rep = 1;
while ($set <= 3) {
    echo "---> Set $set started! <--- <br/>";
    while ($rep <= 12) {
        echo "Rep $rep done! <br/>";
        $rep++;
    }
    $set++;
};
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
        <?php for ($set = 1; $set <= 3; $set++) : ?>
            <p class="font-bold"><?= "Set Number: $set" ?></p>
            <div class="grid grid-cols-3 gap-4 bg-blue-100">
                <?php for ($rep = 1; $rep <= 12; $rep++) : ?>
                    <div class="border border-gray-500 border-1"><?= "Rep Number: $rep" ?></div>
                <?php endfor;  ?>
            </div>
        <?php endfor;   ?>
    </div>
</body>

</html>