<?php 
class User {
    // Properties
    public $name; // Public means this property is accessible from outside
    public $email; // Can also give value to property like public $email = "faizan@gmail.com";
    // Methods
    public function login() {
        echo "User logged in";
    }
    // The most common usecase of PHP's __construct function is just to run a construct method every time a new obj insaniated from class
    function __construct()
    {
        echo "Constructor ran...";
    }
}
// Insaniating new obj
$user1 = new User();
// Accessing public properties & methods
$user1->name = 'Faizan Raza';
$user1->email = 'faizanraza2221@gmail.com';
$user1->login();
// var_dump($user1);
$user2 = new User();
$user2->name = 'John Doe';
$user2->email = "johndoe123@hotmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre> <?= print_r($user1)?> </pre>
</body>
</html>

<!-- Comparison with javascript -->
<script>
    class User {
        constructor(name, email) {
            this.name = name;
            this.email = email;
        }
    }
    const user1 = new User('Faizan Raza', 'faizanraza2221@gmail.com');
    console.log(user1.name);
    console.log(user1.email);
</script>