<?php

require_once("app/core/controller.php");
class About_controller extends core\controller\Controller{

    function show(){
        $this->view->render("about_view.php");
    }
}