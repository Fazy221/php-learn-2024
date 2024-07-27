<?php 
namespace Framework;

class Router {
    protected $routes = []; 

    public function registerRoute($method, $uri, $action) { 
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
    public function get($uri, $controller) {
       $this->registerRoute('GET', $uri, $controller);
    }
    /**
     * Add POST Method
     * 
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function post($uri, $controller) {
        $this->registerRoute('POST', $uri, $controller);
    }
    /**
     * Add DELETE Method
     * 
     * @param string $uri
     * @param string $controller
     * return void
     */
    public function delete($uri, $controller) {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * Load error page
     * @param int $httpCode
     * @return void
     */
    public function error(){ 
        $errController = 'App\\Controllers\\ErrorController';
        $errControllerInstance = new $errController();
        $errControllerInstance->notFound('Route not found!');
        exit;
    }

    /**
     * Route the request
     * @param string $uri
     * @param string $method
     * @return void
     * 
     */
    public function route($uri, $method) {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === $method){
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                return;
            }
        }
        $this->error(); 
    }
}

