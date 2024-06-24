<?php 
/*
-- Difference b/w Sessions and Cookies:
Cookies stored on client side while Session stores on server
Cookies last forever unlike session in which info get lost on destroying
Less secure because stored on client side unlike session
Limited storage capacity so preferred mostly for user preferences or tokens unlike sessions
Sessions mostly use for user authentication, temporary data on server side
*/
setcookie('username', 'fazy', time() + 3600, '/'); // setcookie('key', 'value', expiry, path)
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="cookieDetail.php">Check Cookie in detail</a>
</body>
</html>