<?php

class Blog_model{

    private $articles;



    function getArticles($from, $count){
        require_once("app/models/activeRecords/articleAR.php");
        $this->articles = Article::getArticles($from, $count);
        return $this->articles;
    }

    function newArticle($array){
        require_once("app/models/activeRecords/articleAR.php");
        $array["img"] = "/public/assets/img/blog/".$_FILES["file"]["name"];
        Article::writeArticle($array);
        move_uploaded_file($_FILES["file"]["tmp_name"], "public/assets/img/blog/".$_FILES["file"]["name"]);
    }
}
