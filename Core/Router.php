<?php
namespace Core;
/**
 * Router
 *
 * PHP version 5.4
 */
class Router
{

    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        //convert variables with custom regular expressions eg: {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     *
     * @return boolean  true if a match found, false otherwise
     */
    public function match($url)
    {
        // Match to the fixed URL format /controller/action
        //$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                //$params = [];

                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
    public function dispatch($url){
        $url=$this->removeQueryStringVariable($url);
        if($this->match($url)){
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCase($controller);
            // $controller = "App\Controllers\\$controller";
            $controller=$this->getNameSpace().$controller;
            if(class_exists($controller)){
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller_object,$action])){
                    $controller_object->$action();
                }
                else{
                    echo "method $action (in controller $controller) not found";
                }
            }
            else{
                echo "controller class $controller not found";
            }
        }
        else{
            echo "no route found";
        }
    }
    public function convertToStudlyCase($string){
        $studly= str_replace(' ','',ucwords(str_replace('-',' ',$string)));
        // echo "studly=$studly";
        return $studly;
    }
    public function convertToCamelCase($string){
        $camel =  lcfirst($this->convertToStudlyCase(($string)));
        // echo $camel;
        return $camel;
    }
    protected function removeQueryStringVariable($url){
        if($url!=''){
            $parts = explode('&',$url,2);
            if(strpos($parts[0],'=')===false){
                $url=$parts[0];
            }
            else {
                $url='';
            }
        }
        return $url;
    }
    protected function getNameSpace(){
        $namespace='App\Controllers\\';
        if(array_key_exists('namespace',$this->params)){
            $namespace.=$this->params['namespace'].'\\';
        }
        return $namespace;
    }
}
