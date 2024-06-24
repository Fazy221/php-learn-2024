<?php 
// We've environment variables in php similar to how we put in .env file in node js although instructor mostly just use constants that are accessible anywhere

// Assignment
putenv('DB_HOST=localhost');
putenv('DB_USER=root');

// Getting and saving in variable
$host = getenv('DB_HOST');
$user = getenv('DB_USER');

// Can also get access to all other system's env variables when not pass something including above ones
// var_dump(getenv());
// Getting access to one of system's variables got from above
// echo getenv('HOMEPATH');

// $GLOBAL where values stored in form of arr and used throughout script unlike global keyword. Instructor use it far less but it should be in knowledge
$foo = 'BAR';

function test1() {
    global $foo;
    $foo = 'Changed in test1';
}

function test2() {
    $foo = $GLOBALS['foo'];
    $foo = 'Changed in test2';
}

test1(); // using global keyword to change $foo value
echo $foo; // Output: Changed in test1

$foo = 'BAR';
test2(); // using $GLOBAL to change $foo value
echo $foo; // Output: BAR

/* 
CHATGPT Explanation of difference between $GLOBAL and global keyword
    In test1: global $foo; links $foo inside the function to the global $foo, so changing $foo inside the function changes the global variable.
    In test2: $foo = $GLOBALS['foo']; copies the value of the global $foo to a local variable $foo. Changing the local $foo does not affect the global $foo.

Conclusion

While both global and $GLOBALS allow access to global variables within functions, they do so in different ways. global brings a global variable into the local scope, while $GLOBALS provides direct access to the global variable's value, allowing for different behaviors depending on your needs.
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Information</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto p-8 bg-white shadow-md mt-10 rounded-lg">
    <h1 class="text-3xl font-semibold mb-4 text-center">System Information</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

      <div class="bg-gray-200 p-4 rounded-lg">
        <strong class="block mb-2">DB Host:</strong>
        <?= $host ?>
      </div>
      <div class="bg-gray-200 p-4 rounded-lg">
        <strong class="block mb-2">DB User:</strong>
        <?= $user ?>
      </div>
    </div>
</body>

</html>