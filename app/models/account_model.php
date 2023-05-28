<?php

namespace App\Models;

use App\Http\Requests\AccountRequest;
use App\Models\AR\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account_model
{
    use HasFactory;

    private $accountAR;

    function registration(AccountRequest $accountRequest){
        $this->accountAR = new Account();
        $this->accountAR->name = $accountRequest["name"];
        $this->accountAR->email = $accountRequest["email"];
        $this->accountAR->password = md5($accountRequest["password"]);
        // $this->accountAR = new Account(["login" => $accountRequest["login"], "email" => $accountRequest["email"], "password" => md5($accountRequest["password"])]);
        // die($this->accountAR->email);
        return $this->accountAR->save();
    }

    static function findNameToEnter($email, $password){
        $account = Account::where("email", $email)->where("password", md5($password))->get();
        return $account[0]->name;
    }

    static function findAccountToEnter($email, $password){
        if (Account::where("email", $email)->where("password", md5($password))->count() == 0) return false;
        return true;
    }

    static function accountLogin($array){
        $admin = (($array["email"] == "qqr@mail.ru") && (md5($array["password"] == "fcea920f7412b5da7be0cf42b8c93759")));
        $name = $array["name"] ?? Account_model::findNameToEnter($array["email"], $array["password"]);

        session(["auth" => true, "userName" => $name, "admin" => $admin]);
    }

    static function accountLogout(){
        session()->forget(["auth", "userName", "admin"]);
    }

}
