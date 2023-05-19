<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class Photoalbum_controller extends Controller{
    
    function show(){
        return view("photoalbum", ["model" => $this->model]);
    }
}