<?php
$day = date('l');
switch ($day) {
    case 'Monday':
        $message = "Ah shit, here we go again";
        $color = "Blue";
        break;
    case 'Tuesday':
        $message = "At least it ain't ";
        $color = "Orange";
        break;
    case 'Wednesday':
        $message = "Dry Hump Day";
        $color = "Purple";
        break;
    case 'Thursday':
        $message = "One day until friday";
        $color = "Black";
        break;
    case "Friday":
        $message = "It's horny time";
        $color = "Yellow";
        break;
    case "Saturday":
        $message = "Weekend!!!";
        $color = "Pink";
        break;
    case "Sunday":
        $message = "Weekend!!!";
        $color = "Pink";
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What Day Is It?</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: <?= $color ?>;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <h1><?= $message  ?></h1>
</body>

</html>