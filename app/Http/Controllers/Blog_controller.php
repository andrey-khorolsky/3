<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class Blog_controller extends Controller{

    function show(){
        return view("blog.blog", ["model" => $this->model]);
    }

    function addComment($articleId, $comment){
        return $this->model->newComment(Auth::user()->id, $articleId, $comment);
    }

    function editArticle($articleId, $title, $text){
        return $this->model->editArticle($articleId, $title, $text);
    }

}
