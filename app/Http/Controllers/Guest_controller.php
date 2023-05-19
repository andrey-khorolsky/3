<?php

namespace App\Http\Controllers;
use App\Http\Requests\GuestRequest;

class Guest_controller extends Controller{

    function show(){
        return view("guest", ["model" => $this->model]);
    }

    function newComment(){
        return view("newComment");
    }

    function create(GuestRequest $guestRequest){
        $this->model->writeComment($_POST);
        return redirect("guest");
    }

    function addCommentsFromFile(){
        return view("addCommentFromFile");
    }

    function uploadComments(){

        $this->model->uploadFromFile($_FILES);
        return redirect("guest");
    }
}
