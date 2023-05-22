<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;

class Blog_controller extends Controller{

    function show(){
        return view("blog.blog", ["model" => $this->model]);
    }

    function newArticle(){
        return view("blog.newArticle");
    }

    function create(BlogRequest $blogRequest){
        $this->model->newArticle($_POST, $blogRequest);
        return redirect("blog");
    }

    function addFileWithArticles(){
        return view("blog.addFileWithArticle");
    }

    function uploadArticles(){
        return $this->model->addArticlesFromFile($_FILES["articles"]["tmp_name"]) ?? redirect("blog");
    }
}
