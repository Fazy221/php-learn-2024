<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Add GET Method
     * 
     * @param string $uri
     * @param string $controller 
     * return void 
     */
    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }
    /**
     * Add POST Method
     * 
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }
    /**
     * Add DELETE Method
     * 
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }


    /**
     * Route the request
     * @param string $uri
     * @param string $method
     * @return void
     * 
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        if($requestMethod === 'POST' && isset($_POST['_method'])) { 
            $requestMethod = strtoupper($_POST['_method']);
        } 
        foreach ($this->routes as $route) {
            $uriSegments = explode('/', trim($uri, '/')); 

            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];
                $match = true;
                for ($i = 0; $i < count($uriSegments); $i++) {
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i]; 
                    }
                }
                if ($match) {
                    $controller = 'App\\Controllers\\' . $route['controller']; 
                    $controllerMethod = $route['controllerMethod']; 

                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params); 
                    return;
                }
            }
        }
        ErrorController::notFound();
    }
}
