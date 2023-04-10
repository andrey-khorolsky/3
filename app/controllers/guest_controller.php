<?php
use core\controller\Controller;

require_once("app/core/controller.php");

class Guest_controller extends Controller{

    function show(){
        $this->view->render("guests_view.php");
    }
}
