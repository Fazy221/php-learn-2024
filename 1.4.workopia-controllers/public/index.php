<?php 
require('../helper.php');
// loadView('home'); // Will add routing with assoc arr which incl controllers who'll handle logic instead of doing everything here
$routes = [
    '/' => 'controllers/home.php',
    '/listings' => 'controllers/listings/index.php',
    '/listings/create' => 'controllers/listings/create.php',
    '404' => 'controllers/error/404.php'
];

$uri = $_SERVER['REQUEST_URI']; // This is uri we're currently hitting on in search box like '/' which come at end of 'http://workopia.test' and means home or '/listings' which come at end of 'http://workopia.test'
// inspectAndDie($uri); // Can see it too as running this helper func shows output --- string(1) "/" --- on url 'http://workopia.test/' and output --- string(9) "/listings" --- on url 'http://workopia.test/listings'

// Will add condition that if our requested uri exist as key in routes assoc arr then execute controller otherwise show 404
if(array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri])); // will use basePath to reach parent dir then use $routes[$uri]. If $uri is / and it's as key in routes then $routes[$uri] means /'s value which is 'controllers/home.php'
} else {
    require(basePath($routes['404']));
}