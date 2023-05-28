<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class Contact_controller extends Controller{


    function check(ContactRequest $contactRequest){
        $this->model->setData($contactRequest);
        return view("contacts.answer", ["model" => $this->model]);
    }
}
