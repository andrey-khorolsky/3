<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact_model
{
    use HasFactory;


    private $fio;
    private $birth;
    private $sex;
    private $age;
    private $email;
    private $tel;

    function setData($array){
        $this->fio = $array["fio"];
        $this->birth = $array["birth"];
        $this->sex = $array["sex"];
        $this->age = $array["age"];
        $this->email = $array["email"];
        $this->tel = $array["tel"];
    }



    /**
     * Get the value of fio
     */ 
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * Get the value of birth
     */ 
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

}
