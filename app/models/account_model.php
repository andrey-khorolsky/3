<?php

namespace App\Models;

use App\Http\Requests\AccountRequest;
use App\Models\AR\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
