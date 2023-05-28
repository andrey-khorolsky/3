@extends('Layouts.layout')


@section('head')
    <title>Гостевая книга</title>
    <link rel="stylesheet" type="text/css" href="/css/for_guest.css">
    <script src="/js/testguest.js"></script>
@endsection


@section('content')

    <div class="newcomm">
        <a href="/guest/newComment">Write new</a>
        <a href="/blog">Блог</a>
    </div>

    <div class="book">
        <?
        
        foreach($model->getAllComments() as $comment){
            ?>
            <div class="card">
                <div class="comment__date"><?=$comment["date"]?></div>
                <div class="comment__author"><?=$comment["fio"]?></div>
                <div class="comment__text"><?=$comment["text"]?></div>
            </div>
            <?
        }
        ?>
    </div>

@endsection
