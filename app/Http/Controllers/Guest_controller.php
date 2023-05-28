<?php

namespace App\Http\Controllers;
use App\Http\Requests\GuestRequest;

class Guest_controller extends Controller{

    function show(){
        return view("guest.guest", ["model" => $this->model]);
    }

    function create(GuestRequest $guestRequest){
        $this->model->writeComment($guestRequest);
        return redirect("/guest");
    }

}
