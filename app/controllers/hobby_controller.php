<?php

require_once("app/core/controller.php");
class Hobby_controller extends core\controller\Controller{

    function show(){
        
        require_once("app/models/hobby_model.php");
        $hobbyModel = new Hobby_model();

        $this->view->render("hobby_view.php", $hobbyModel);
    }
}