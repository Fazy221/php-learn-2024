<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use Framework\Router; 
use Framework\Session; // importing session through namespace since our autoloader loads it

Session::start(); // This will start the session

require('../helper.php');
// inspectAndDie(session_status()); // will verify if session status is started which means 2

$router = new Router(); 

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$router->route($uri);
