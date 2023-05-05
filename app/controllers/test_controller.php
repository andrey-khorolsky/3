<?php

require_once("app/core/controller.php");
class Test_controller extends core\controller\Controller{

    function show(){

        $this->view->render("test_view.php");
    }

    function check(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

			require_once("app/models/test_model.php");
			$this->model = new Test_model($_POST);

			//валидация
			if ($this->model->validForm($this->model->getAnswers())){
            
                require_once("app/models/activeRecords/testAnswerAR.php");

                //вывод сообщения об удачной отправке и проверка (вывод) результатов
                $this->model->verificationResults($this->model->getAnswers());
                $this->model->saveResults();
                $this->view->render("answers/test_right_answer_view.php", $this->model);

			} else {
                //вывод сообщения о неудачной отправке
                $this->view->render("test_view.php", $this->model);
			}
            
		} else $this->show();
    }

}