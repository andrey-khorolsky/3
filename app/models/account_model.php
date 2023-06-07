<?php

namespace App\Models;

use App\Http\Requests\AccountRequest;
use App\Models\AR\Account;
// use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Validator;

class Account_model
{
    use HasFactory;

    private $accountAR;

    function registration(AccountRequest $accountRequest){
        $this->accountAR = new User();
        $this->accountAR->name = $accountRequest["name"];
        $this->accountAR->email = $accountRequest["email"];
        $this->accountAR->password = md5($accountRequest["password"]);
        $this->accountAR->save();
        return $this->accountAR;
    }

    static function findNameToEnter($email, $password){
        $account = User::where("email", $email)->where("password", md5($password))->get();
        return $account[0]->name;
    }

    static function findAccountToEnter($email, $password){
        if (User::where("email", $email)->where("password", md5($password))->count() == 0) return false;
        return true;
    }

    static function accountLogin($array){
        $admin = (($array["email"] == "qqr@mail.ru") && (md5($array["password"] == "fcea920f7412b5da7be0cf42b8c93759")));
        $name = $array["name"] ?? Account_model::findNameToEnter($array["email"], $array["password"]);
        // session(["auth" => true, "userName" => $name, "admin" => $admin]);
        // Auth::attempt(["email" => $array["email"], "password" => $array["password"]]);
        // Auth::login();
    }

    static function accountLogout(){
        session()->forget(["auth", "userName", "admin"]);
    }

    
    function checkEmail($email){
        $validEmail = preg_match('/^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/', $email) == 1;

        return json_encode(['res' => User::where('email', $email)->count(), 'errvalid' => $validEmail]);
    }

}
