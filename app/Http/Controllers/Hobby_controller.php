<?php

namespace App\Http\Controllers;

class Hobby_controller extends Controller{

    function show(){
        return view("hobby", ["model" => $this->model]);
    }
}