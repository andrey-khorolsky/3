<?php

require_once("app/core/controller.php");
class Test_controller extends core\controller\Controller{

    function show(){
        $this->view->render("test_view.php");
    }

    function check(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

			require_once("app/models/test_model.php");
			$testModel = new Test_model();

            $q2 = ($_POST["q21"] ?? "")." ".($_POST["q22"] ?? "")." ".($_POST["q23"] ?? "")." ".($_POST["q24"] ?? "")." ".($_POST["q25"] ?? "");
            $_POST["q2"] = $q2;

			//валидация
			if ($testModel->validForm($_POST)){

                //вывод сообщения об удачной отправке и проверка (вывод) результатов
                $this->view->render("answers/test_right_answer_view.php", $testModel);

			} else {
                //вывод сообщения о неудачной отправке
                $this->view->render("test_view.php", $testModel);
			}
            
		} else $this->show();
    }

}