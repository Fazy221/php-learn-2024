<?php
require __DIR__ . '/../vendor/autoload.php';
require('../helper.php');
use Framework\Router; 
$router = new Router(); 

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$router->route($uri);
