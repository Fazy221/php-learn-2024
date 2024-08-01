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
        foreach ($this->routes as $route) {
            // Split current URI into segments (Will use explode func to make arr with 1st val before / = listing & 2nd val after / = 1)
            $uriSegments = explode('/', trim($uri, '/')); // Using trim will remove trailing slashes from start/end like '/listing/1/' = 'listing/1'
            // inspectAndDie($uriSegments);

            // Split defined defined route URI into segmnets
            $routeSegments = explode('/', trim($route['uri'], '/'));
            // inspect($routeSegments);

            $match = true;

            // Check if no. of both segments matches when counted & method from defined route matches with request method
            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];
                $match = true;
                // Will run loop to match each element of both segments with each other
                for ($i = 0; $i < count($uriSegments); $i++) {
                    // If curr uriSeg don't match with routeSeg & it ain't routeSeg param {id} then it'll break out of loop
                    // In 1st iteration, 1st cond = false as [listing === listing] while it shouldn't but 2nd cond = true (curr routeSeg ain't {id} but listing) 
                    // Then 2nd iteration, 1st cond could be true [1 !== {id}] where {id} could be 2 but if curr routeSeg isn't {id} then loop breaks. 
                    // This is helpful as both cond need to be true so it ain't like we reach 3rd iteration where routeSeg {id} match with uriSeg 
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    // If uri actually matches with routeSeg actually being {id} then execute below
                    // Matches is 3rd arg of preg_match func which returns 2 el in arr: wrapped routeSeg {id} && without wrap id
                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        // inspectAndDie($matches); // returns [{id}, id]. Both are routeSeg. This is just checking if it work. 
                        $params[$matches[1]] = $uriSegments[$i]; // inserting into params arr: id = 1
                        // inspectAndDie($params); // verifying
                    }
                }
                // If match is true then continue operation
                if ($match) {
                    $controller = 'App\\Controllers\\' . $route['controller']; // i.e., ListController
                    $controllerMethod = $route['controllerMethod']; // i.e., show

                    $controllerInstance = new $controller(); // insaniation of listController
                    $controllerInstance->$controllerMethod($params); // after modifyinng show method to accept $param which is id, will have this $param['id'] passed to db in it
                    return;
                }
            }

            // if($route['uri'] === $uri && $route['method'] === $method){
            //     $controller = 'App\\Controllers\\' . $route['controller'];
            //     $controllerMethod = $route['controllerMethod'];

            //     $controllerInstance = new $controller();
            //     $controllerInstance->$controllerMethod();
            //     return;
            // }

        }
        ErrorController::notFound();
    }
}
