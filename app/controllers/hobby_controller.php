<?php

require_once("app/core/controller.php");
class Hobby_controller extends core\controller\Controller{

    function show(){
        $this->view->render("hobby_view.php");
    }
}