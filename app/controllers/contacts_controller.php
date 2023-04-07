<?php

require_once("app/core/controller.php");
class Contacts_controller extends core\controller\Controller{

    function show(){
        $this->view->render("contacts_view.php");
    }

    function check(){
        if ($_SERVER["REQUEST_METHOD"] === "POST"){

			require_once("app/models/contacts_model.php");
			$testModel = new Contacts_model();

			//валидация
			if ($testModel->validForm($_POST)){

                //отправка данных на почту
                $msg = 
                    'Данные пользователя
                    ФИО:'.$_POST["fio"].'
                    Дата рождения: '.$_POST["birth"].'
                    Пол: '.$_POST["sex"].'
                    Возраст: '.$_POST["age"].'
                    Электронная почта: '.$_POST["email"].'
                    Номер телефона: '.$_POST["tel"];

                $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
                $headers .= "From: От кого письмо <from@example.com>\r\n"; 
                $headers .= "Reply-To: reply-to@example.com\r\n";
                
                if (mail("<horolskyandrey@gmail.com>", "Контакты", $msg, $headers))
                    //вывод сообщения об удачной отправке
                    $this->view->render("answers/contacts_right_answer_view.php") ;

			} else {

                //вывод сообщения о неудачной отправке
                $this->view->render("answers/contacts_wrong_answer_view.php", $testModel);
			}
            
		} else $this->show();
    }
}