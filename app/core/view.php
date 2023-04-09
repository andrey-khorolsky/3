<?php
namespace core\view;
class View{

    function render($content, $model = null){
        echo '<!DOCTYPE html>
            <html lang="ru">
                <head>
                    <meta charset="utf-8">
                    <link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
                    <link type="image/x-icon" href="/public/assets/img/hotdog.ico" rel="icon">
                    <script src="/public/assets/js/jquery-3.6.1.js"></script>
                    <script src="/public/assets/js/goods.js"></script>
                </head>

                <body>
                    <nav class="nav">
                        <ul>
                            <li> <a href="/main/"><img src="">Главная</a></li>
                            <li> <a href="/about/"><img src="">Обо мне</a> </li>
                            <li> <a onclick="openMenu();"><img src="">Мои интересы</a></li>
                            <li> <a href="/photoalbum/"><img src="">Фото</a></li>
                            <li> <a href="/contacts/"><img src="">Контакты</a></li>
                            <li> <a href="/test/"><img src="">Тест</a></li>
                            <li> <a href="/history/"><img src="">История</a></li>
                        </ul>
                    </nav>';

                if (isset($content)) require_once("app/views/".$content);

        echo '  </body>
            </html>';
    }
}