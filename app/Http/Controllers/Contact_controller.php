<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class Contact_controller extends Controller{

    function check(ContactRequest $request){

        //отправка данных на почту
        // $msg = 
        //     'Данные пользователя
        //     ФИО:'.$_POST["fio"].'
        //     Дата рождения: '.$_POST["birth"].'
        //     Пол: '.$_POST["sex"].'
        //     Возраст: '.$_POST["age"].'
        //     Электронная почта: '.$_POST["email"].'
        //     Номер телефона: '.$_POST["tel"];

        return view("contacts.answer");
    }
}