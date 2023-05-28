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
            $this->model->accountLogin($accountRequest);
            return redirect("/account");
        }
        return back();
    }

    function signIn(AccountRequest $accountRequest){
        if (!Account_model::findAccountToEnter($accountRequest["email"], $accountRequest["password"]))
            return back()->with("trouble_with_login", "Проблемы при входе в аккаунт");
        
        $this->model->accountLogin($accountRequest);
        return redirect("/account");
    }


    function signOut(){
        $this->model->accountLogout();
        return redirect("/account");
    }
}
