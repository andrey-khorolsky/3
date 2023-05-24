<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;

class Blog_controller extends Controller{

    function show(){
        return view("blog.blog", ["model" => $this->model]);
    }

}
