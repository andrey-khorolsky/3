<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;

class Test_controller extends Controller{

    function check(TestRequest $testRequest){

        //вывод сообщения об удачной отправке и проверка результатов
        $this->model->verificationResults($this->model->getAnswers());
        $this->model->saveResults();

        return view("test.answer", ["model" => $this->model]);
    }

}