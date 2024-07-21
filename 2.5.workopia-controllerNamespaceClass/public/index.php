<?php
require __DIR__ . '/../vendor/autoload.php';
require('../helper.php');
use Framework\Router; // Way 2 of using namespace (Recommended)
// $router = new Framework\Router(); // Way 1 of using namespace
$router = new Router(); 

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
