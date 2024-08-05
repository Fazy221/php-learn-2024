<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function login()
    {
        loadView('users/login');
    }

    public function create()
    {
        loadView('users/create');
    }

    public function store()
    {
        // inspectAndDie('store'); // verifying if clicking register btn working as expected
        // Will now save each value in individual variable
        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password_confirmation'];

        $errors = [];

        // Now will validate
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address!';
        };
        if(!Validation::string($name, 2, 50)) {
            $errors['name'] = 'Name must be between 2 and 50 characters';
        }
        if(!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be atleast 6 characters';
        }
        if(!Validation::match($password, $passwordConfirmation)) {
            $errors['confirm_password'] = 'Passwords do not matched';
        }
        // If errors arr contain errors then will reload view with fields data which won't incl password for ofc reasons
        if (!empty($errors)) {
            loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            exit;
        } else {
            inspectAndDie('Store');
        }
    }
}
