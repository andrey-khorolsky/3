<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account_model;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Account_controller extends Controller
{
    
    function registration(AccountRequest $accountRequest){
        if (!$this->model->findAccountToEnter($accountRequest['email'], $accountRequest['password'])){
            
            try{
                Auth::login($this->model->registration($accountRequest));
            } catch (Exception $e){
                return redirect()->back()->with('registration', 'Ошибка при регистрации');
            }
            
            return redirect("/account");

        } else {
            return back()->with('registration', 'Такой email и пароль уже используются');
        }
    }

    function signIn(AccountRequest $accountRequest){
        if (!Account_model::findAccountToEnter($accountRequest["email"], $accountRequest["password"]))
            return back()->with("trouble_with_login", "Проблемы при входе в аккаунт");

        $user = (new User)->where("email", $accountRequest["email"])->where("password", md5($accountRequest["password"]))->get()["0"];
        Auth::login($user);

        return redirect("/account");
    }


    function signOut(){
        Auth::logout();
        return redirect("/account");
    }


    function checkEmail($request){
        return $this->model->checkEmail($request['email']);
    }
}
