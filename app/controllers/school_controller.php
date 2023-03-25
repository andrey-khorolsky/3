<?php

require_once("app/core/controller.php");
class School_controller extends core\controller\Controller{

    function show(){
        $this->view->render("school_view.php");
    }
}