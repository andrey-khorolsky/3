<?php

require_once("app/core/controller.php");
class About_controller extends Controller{

    function show(){
        // require_once("app/views/about_view.php");
        $this->view->render("about_view.php");
    }
}