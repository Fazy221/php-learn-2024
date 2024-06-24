<?php 
$username = $_COOKIE['username'] ?? 'Guest';
// var_dump($_COOKIE); // Output = array(2) { ["PHPSESSID"]=> string(26) "k5fg05ai4v2vvo3gjsr0m60ved" ["username"]=> string(4) "fazy" } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Welcome back, <?= $username ?> </p>
    <a href="destroyCookie.php">Destroy cookie now!</a>
</body>
</html>