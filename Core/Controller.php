<?php 
namespace Core;

abstract class Controller{
    protected $route_param = [];

    public function __construct($route_param){
        $this->route_param=$route_param;
    }
    public function __call($name,$args){
        $method = $name.'Action';
        if(method_exists($this,$method)){
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        }
        else{
            echo "Method $method not found in controller".get_class($this);
        }
    }
    protected function before(){

    }
    protected function after(){

    }
}
?>