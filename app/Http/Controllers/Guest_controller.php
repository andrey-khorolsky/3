<?php

namespace App\Http\Controllers;
use App\Http\Requests\GuestRequest;

class Guest_controller extends Controller{

    function show(){
        return view("guest.guest", ["model" => $this->model]);
    }

    function newComment(){
        return view("guest.newComment");
    }

    function create(GuestRequest $guestRequest){
        $this->model->writeComment($_POST);
        return redirect("guest");
    }

    function addCommentsFromFile(){
        return view("guest.addCommentFromFile");
    }

    function uploadComments(){

        $this->model->uploadFromFile($_FILES);
        return redirect("guest");
    }
}
