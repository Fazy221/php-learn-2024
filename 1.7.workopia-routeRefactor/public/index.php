<?php 
require('../helper.php');


require basePath('Router.php');


$router = new Router(); // insaniating Router class imported from Router.php

$routes = require basePath('routes.php'); 
/** Whole flow explained
 * We've routes above which gets access of insaniated $router's class above along with it's class methods
 * Now in routes, we'll use method like ->get of $router class in which we'll define $uri like / & $controller
   * routes will be like definition file where on each method like get/post/del, a specific $uri and $controller is defined
   * from there, the two go in class's defined public func like in get func as params t
   * From there, they go to registeredRoute w/ method defined based on method they're. If get method then method will also be same
   * Under registeredRoute, $uri, $controller, $method are added to the protected routes assoc array as key/values like 'method'=>$method 
     * Internally, it will be like ['method'=>'GET','uri'=>'/','controller'=>'controller/home.php'] after value insertion)
 * Now below, we take actual request uri & method taken at time of http request being made and store in variables
   * Then use router class method route which takes in these requested $uri and $method
   * The route method loops through protected routes to see if requested $uri & $method matches with $uri $method defined inside
   * If match is found then defined controller from protected routes will be executed by requiring it
     * We'll use controller by using require. In controller e.g controller/home, loadView is used to load home view
     * Will return in route func from there so func won't block won't get further executed
   * If match not found in loop then code progress further with error method from class being used there 
     * Error method will take in httpStatusCode as arg. 
     * It has 404 as default param therefore we can simply call from inside func without adding arg
     * Error method will return http response code from arg & load view from error folder which is by same name then exit
 */

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD']; // will tell if request method is GET, POST, DELETE etc so useful in router class

$router->route($uri, $method);