<?php 

class User {
    public $name;
    public $email;
    private $status = 'active'; // private property so can be only accessed from inside class

    function login() {
        echo "Log In!";
    }

    function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
    // Since getter/setter funcs are inside class so they can access private property. We can use them to get access to class's private property from global scope
    function getStatus() { 
        echo $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }
}

$user1 = new User('Faizan Raza', 'faizanraza2221@gmail.com');
$user2 = new User('Azlan Faizan', 'azlanfaizan123@gmail.com');
$user1->setStatus('inactive');
$user1->getStatus(); 