<?php

require_once("app/core/controller.php");
class Test_controller extends core\controller\Controller{

    function show(){
        $this->view->render("test_view.php");
    }
}