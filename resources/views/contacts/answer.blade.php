@extends('layout')


@section("content")
    <div calss="test">
        <div class="tstf">
            <p>Контакты отправлены</p>
            <p>Данные:</p>
            <p>ФИО: <?echo $_POST["fio"]?></p>
            <p>Дата рождения: <?echo $_POST["birth"]?></p>
            <p>Пол: <?echo $_POST["sex"]?></p>
            <p>Возраст: <?echo $_POST["age"]?></p>
            <p>Электронная почта: <?echo $_POST["email"]?></p>
            <p>Номер телефона: <?echo $_POST["tel"]?></p>
        </div>
        <div class="sch">
            <a href="/contacts">Вернуться</a>
        </div>
    </div>
@endsection
