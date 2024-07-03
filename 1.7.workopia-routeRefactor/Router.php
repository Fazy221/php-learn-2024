<?php 

class Router {
    protected $routes = []; // assoc arr comprised of $method, $uri and $controller from registered route will be added there dynamically after they're processed from routes.php file and methods func 

    public function registerRoute($method, $uri, $controller) { // Made this ultimate route registerer to avoid dry code by adding $uri and $controller to protected routes in each method each time
        $this->routes[] = [ // defined assoc arr will be added in empty arr of protected routes
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
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
    public function error($httpCode = 404){ // Will have 404 as default of httpCode
        http_response_code($httpCode); // Send http response 
        loadView("error/$httpCode"); // load error view if exists 
        exit;
    }

    /**
     * Route the request
     * @param string $uri
     * @param string $method
     * @return void
     * 
     * This func will be used in index.php. it'll take in $uri & $method of http request being made and stored 
     * in variables then loop through protected routes arr to match if asked $uri and $method exists and if does then execute controller
     */
    public function route($uri, $method) {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === $method){
                require basePath($route['controller']);
                return;
            }
        }
        $this->error(); // since 404 is default so won't put there
    }
}

