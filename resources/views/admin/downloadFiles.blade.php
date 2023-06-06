@extends('Layouts.admin_layout')


@section('head')
@endsection


@section('content')
    <a href="{{$model->getBlogFile()}}" download="blog.csv">Скачать файл Блога</a>
    <br>
    <a href="{{$model->getGuestFile()}}" download="messages.txt">Скачать файл Гостевой книги</a>
@endsection
