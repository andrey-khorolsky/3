@extends('Layouts.layout')


@section("content")
    <div calss="test">
        <div class="tstf">
            <p>Контакты отправлены</p>
            <p>Данные:</p>
            <p>ФИО: <?= $model->getFio()?></p>
            <p>Дата рождения: <?= $model->getBirth()?></p>
            <p>Пол: <?= $model->getSex()?></p>
            <p>Возраст: <?= $model->getAge()?></p>
            <p>Электронная почта: <?= $model->getEmail()?></p>
            <p>Номер телефона: <?= $model->getTel()?></p>
        </div>
        
        <div class="sch">
            <a href="/contacts">Вернуться</a>
        </div>
    </div>
@endsection
