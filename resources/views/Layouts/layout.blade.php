<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
        <link type="image/x-icon" href="/public/img/hotdog.ico" rel="icon">
        <script src="/public/js/jquery-3.6.1.js"></script>
        <script src="/public/js/goods.js"></script>
        @yield('head')
    </head>

    <body>
        <nav class="nav">
            <ul>
                <li> <a href="/"><img src="">Главная</a></li>
                <li> <a href="/guest"><img src="">Гостевая книга</a> </li>
                <li> <a onclick="openMenu();"><img src="">Мои интересы</a></li>
                <li> <a href="/photoalbum"><img src="">Фото</a></li>
                <li> <a href="/contacts"><img src="">Контакты</a></li>
                <li> <a href="/test"><img src="">Тест</a></li>
                <li> <a href="/account"><img src="">Аккаунт</a></li>
            </ul>
        </nav>

        @yield("content")

    </body>
    
</html>
