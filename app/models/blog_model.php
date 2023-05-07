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
        $array["img"] = $_FILES["file"]["name"] ? "/public/assets/img/blog/".$_FILES["file"]["name"] : null;
        Article::writeArticle($array);
        move_uploaded_file($_FILES["file"]["tmp_name"], "public/assets/img/blog/".$_FILES["file"]["name"]);
    }

    function getPagesCount(){
        require_once("app/models/activeRecords/articleAR.php");
        return count(Article::FindAll());
    }

    function addArticlesFromFile($file){
        require_once("app/models/activeRecords/articleAR.php");

        $openedFile = fopen($file, "r");
        while($str = fgetcsv($openedFile)){
            $arr = [
                "date" => $str["3"],
                "title" => $str["0"],
                "text" => $str["1"],
                "author" => $str["2"]
            ];
            Article::writeArticle($arr);
        }
    }
}
