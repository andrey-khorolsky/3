<?php
namespace App\Models\Validators;

class ResultVerificator{

    function verificationResults($array){

        $result = [0, 0, 0];

        if (strcasecmp($array["hm"], "нет") === 0){
            $result[0] = 1;
        }

        if (!(str_contains($array["q2"], "д") || str_contains($array["q2"], "а") || str_contains($array["q2"], "Д") || str_contains($array["q2"], "А"))){
            $result[1] = 1;
        }

        if (strcmp($array["lq"], "интересная тема") === 0){
            $result[2] = 1;
        }

        return [$result[0]+$result[1]+$result[2], $result["0"], $result["1"], $result["2"]];
    }
}