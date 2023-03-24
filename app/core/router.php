<?php

class Router{

    static function start(){
        
        $controller = null;

        // echo json_encode($_GET);
        // if (isset($_REQUEST["controller"])) echo $_REQUEST["controller"];
        if (!isset($_REQUEST["controller"])){
            require("app/views/main_view.php");
            return;
        }
        // if ($_REQUEST["controller"] === "photoalbum") require("app/views/photo_view.php");

        // switch ($_REQUEST["controller"]){
        //     case "photoalbum":
        //         require_once("app/controllers/photoalbum_controller.php");
        //         $controller = new Photoalbum_controller;
        //         break;
        //     case "main":
        //         require_once("app/controllers/main_controller.php");
        //         $controller = new Main_controller;
        //         break;
        // }

        $controller_name = $_REQUEST["controller"]."_controller";
        require_once("app/controllers/".$controller_name.".php");

        $controller_name = ucfirst($controller_name);
        $controller = new $controller_name;
        
        if (!is_null($controller))
        $controller->show();
    }
}