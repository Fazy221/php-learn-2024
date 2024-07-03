<?php 

class Router {
    protected routes = []; // will make routes protected so not accessible outside of class except inherited 


    /**
     * Add GET Method
     * 
     * @param string $uri
     * @param string $controller // This is for 2nd argument
     * return void 
     */
    function get($uri, $controller) {
        $this->routes = [  // will insert method, uri and controller in routes
            'method' = 'GET',
            'uri' = $uri,
            'controller' = $controller
        ]
    }
    /**
     * Add POST Method
     * 
     * @param string $uri
     * @param string $controller
     * return void
     */
    function post($uri, $controller) {
        $this->routes = [
            'method' = 'POST',
            'uri' = $uri,
            'controller' = $controller
        ]
    }
    /**
     * Add DELETE Method
     * 
     * @param string $uri
     * @param string $controller
     * return void
     */
    function delete($uri, $controller) {
        $this->routes = [
            'method' = 'DELETE',
            'uri' = $uri,
            'controller' = $controller
        ]
    }
}

// Above, since we're repeating ourselves with adding stuff in routes in same way, will go with shortcut in next file