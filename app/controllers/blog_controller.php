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

    function addFileWithArticles(){
        $this->view->render("addFileWithArticles_view.php");
    }

    function uploadArticles(){
        require_once("app/models/blog_model.php");
        $this->model = new Blog_model();

        move_uploaded_file($_FILES["articles"]["tmp_name"], "public/assets/".$_FILES["articles"]["name"]);
        $this->model->addArticlesFromFile("public/assets/".$_FILES["articles"]["name"]);

        header("Location: /blog/");
    }
}
