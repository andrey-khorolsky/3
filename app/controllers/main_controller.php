<?php

require_once("app/core/controller.php");
class Main_controller extends core\controller\Controller{

    function show(){
        $this->view->render("main_view.php");
    }
}