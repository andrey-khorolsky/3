<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Account_controller extends Controller
{
    
    function registration(AccountRequest $accountRequest){
        if ($this->model->registration($accountRequest)){
            session(["auth" => true, "userName" => $accountRequest["name"], "admin" => true]);
            return redirect("/account");
        }
        return back();
    }

    function signIn(AccountRequest $accountRequest){
        if (!Account_model::findAccountToEnter($accountRequest["email"], $accountRequest["password"]))
            return back()->with("trouble_with_login", "Проблемы при входе в аккаунт");
        session(["auth" => true, "userName" => Account_model::findNameToEnter($accountRequest["email"], $accountRequest["password"]), "admin" => true]);
        return redirect("/account");
    }


    function signOut(){
        session()->forget(["admin", "auth", "userName"]);
        return redirect("/account");
    }
}
