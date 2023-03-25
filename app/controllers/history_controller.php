<?php

require_once("app/core/controller.php");
class History_controller extends core\controller\Controller{

    function show(){
        $this->view->render("history_view.php");
    }
}