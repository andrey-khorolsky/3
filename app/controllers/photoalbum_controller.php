<?php

require_once("app/core/controller.php");
class Photoalbum_controller extends core\controller\Controller{
    
    function show(){
        $this->view->render("photoalbum_view.php");
    }
}