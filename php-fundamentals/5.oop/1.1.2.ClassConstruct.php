<?php 

class User {
    public $name;
    public $email;
    public function login() {
        echo $this->name . " logged in!";
    }
    /* Instead of getting access to value directly from global scope and manually assigning, can simply 
    pass in values in construct func with "this" keyword like js during time of insaniation */
    function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}

$user1 = new User('Faizan Raza', 'faizanraza2221@gmail.com');
$user2 = new User('Azlan Faizan', 'azlanfaizan123@hotmail.com');
// echo $user1->name;
// echo $user2->email;
echo $user2->login();