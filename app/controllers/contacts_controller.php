<?php

require_once("app/core/controller.php");
class Contacts_controller extends core\controller\Controller{

    function show(){
        $this->view->render("contacts_view.php");
    }
}