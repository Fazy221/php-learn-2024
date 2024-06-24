<?php 

class User {
    public $name;
    public $email;
    protected $status = 'active'; // protected means it's accessible to not only it's own class but those inherited from it as well

    function login() {
        echo "Log In!";
    }

    function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
    function getStatus() { 
        echo $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }
}

class Admin extends User {
    public $level;
    function __construct($name, $email, $level)
    {
        $this->level = $level;
        parent::__construct($name, $email); // Instead of redefining properties which have to be used at time of insaniation, can use parent construct method to take from parent class
    }
    function login() {
        echo 'Admin ' . $this->name . ' logged in!'; // Can rewrite method in child class. This is called polymorphism because login at same time can have different role depending on class & specifically user role in curr context
    }
}

$admin = new Admin('Timmy', 'timmy123@yahoo.com', 100);
// echo $admin->name; // Using property from parent class
// echo $admin->login(); // Using rewritten login method from admin class. If comment out then will simply use parent one
echo $admin->getStatus(); // As status property is protected, inherited class can use it. If changed to private then will return error