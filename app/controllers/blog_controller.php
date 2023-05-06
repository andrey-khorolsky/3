<?php

require_once("app/core/controller.php");

class Blog_controller extends core\controller\Controller{

    function show(){
        
        require_once("app/models/blog_model.php");
        $this->model = new Blog_model();
        $this->view->render("blog_view.php", $this->model);
    }

    function newArticle(){
        $this->view->render("newArticle_view.php");
    }

    function create(){
        require_once("app/models/blog_model.php");
        $this->model = new Blog_model();
        $this->model->newArticle($_POST);
        header("Location: /blog/");
    }
}
