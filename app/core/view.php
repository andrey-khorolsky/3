<?php
namespace core\view;
class View{

    private $layout = "layoutView.php";

    function render($content, $var = null){
        echo '<!DOCTYPE html>
            <html lang="ru">
                <head>
                    <meta charset="utf-8">
                    <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
                    <link type="image/x-icon" href="http://web-my-site/public/assets/img/hotdog.ico" rel="icon">
                    <script src="/jquery-3.6.1.js"></script>
                    <script src="/public/assets/js/goods.js"></script>
                </head>

                <body>
                    <nav class="nav">
                        <ul>
                            <li> <a href="http://web-my-site/main/"><img src="">Главная</a></li>
                            <li> <a href="http://web-my-site/about/"><img src="">Обо мне</a> </li>
                            <li> <a onclick="openMenu();"><img src="">Мои интересы</a></li>
                            <li> <a href="http://web-my-site/photoalbum/"><img src="">Фото</a></li>
                            <li> <a href="http://web-my-site/contacts/"><img src="">Контакты</a></li>
                            <li> <a href="http://web-my-site/test/"><img src="">Тест</a></li>
                            <li> <a href="http://web-my-site/history/"><img src="">История</a></li>
                        </ul>
                    </nav>';

        if (isset($content)) require_once("app/views/".$content);

        echo '  </body>
            </html>';
    }
}