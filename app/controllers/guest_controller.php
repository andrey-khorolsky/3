<?php
use core\controller\Controller;

require_once("app/core/controller.php");

class Guest_controller extends Controller{

    function show(){
        require_once("app/models/guest_model.php");
        $this->model = new Guest_model();
        $this->view->render("guests_view.php", $this->model);
    }

    function newComment(){
        require_once("app/models/guest_model.php");
        $this->model = new Guest_model();
        $this->view->render("newComment_view.php", $this->model);
    }

    function create(){
        require_once("app/models/guest_model.php");
        $this->model = new Guest_model();
        if (!$this->model->validate($_POST)){
            header("Location: /guest/newComment");
        }
        
        $this->model->writeComment($_POST);
        header("Location: /guest/");
    }

    function addCommentsFromFile(){
        $this->view->render("addCommentsFromFile_view.php", $this->model);
    }

    function uploadComments(){
        if (move_uploaded_file($_FILES["messages"]["tmp_name"], "public/assets/".$_FILES["messages"]["name"]))
            header("Location: /guest/");
        else echo "bad!";
    }
}
