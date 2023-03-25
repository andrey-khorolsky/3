<?php

class Router{

    static function start(){
        
        $controller = null;

        if (!isset($_REQUEST["controller"])) header("Location: http://web-my-site/main/");

        $controller_name = $_REQUEST["controller"]."_controller";
        require_once("app/controllers/".$controller_name.".php");

        $controller_name = ucfirst($controller_name);
        $controller = new $controller_name;
        
        if (!is_null($controller)) $controller->show();
    }
}