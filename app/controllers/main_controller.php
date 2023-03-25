<?php
require_once("app/core/controller.php");
class Main_controller extends Controller{

    function show(){
        // require_once("app/views/main_view.php");
        $this->view->render("main_view.php");
    }
}