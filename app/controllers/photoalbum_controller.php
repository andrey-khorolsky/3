<?php

require_once("app/core/controller.php");
class Photoalbum_controller extends core\controller\Controller{
    
    function show(){
        
	    require_once("app/models/photoalbum_model.php");
        $photoModel = new Photoalbum_model();

        $this->view->render("photoalbum_view.php", $photoModel);
    }
}