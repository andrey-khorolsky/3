<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;

class Blog_controller extends Controller{

    function show(){
        return view("blog", ["model" => $this->model]);
    }

    function newArticle(){
        return view("newArticle");
    }

    function create(BlogRequest $blogRequest){
        $this->model->newArticle($_POST, $blogRequest);
        return redirect("blog");
    }

    function addFileWithArticles(){
        return view("addFileWithArticle");
    }

    function uploadArticles(){
        return $this->model->addArticlesFromFile($_FILES["articles"]["tmp_name"]) ?? redirect("blog");
    }
}
