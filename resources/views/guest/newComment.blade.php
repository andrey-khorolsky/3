@extends('layout')


@section("head")
    <link rel="stylesheet" type="text/css" href="/css/for_guest.css">
@endsection


@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <div class="test">
            @foreach ($errors->all() as $error)
                <div class="tstf">{{ $error }}</div>
            @endforeach
        </div>
    </div>
    @endif

    <form class="guestform" method="post" name="guestform" onsubmit="return checkguest();" action="/guest/create">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <div class="guestform__row">

            <div class="inp__row">
                <input type="text" id="fio" name="fio" placeholder="Фамилия Имя Отчество" value="{{ old('fio') }}">
                <input type="text" id="email" name="email" placeholder="email@email.com" value="{{ old('email') }}">
            </div>

            <textarea cols="50" rows="4" name="text" placeholder="Напишите тут свой отзыв">{{ old('text') }}</textarea>

            <button class="btn" type="submit">Отправить!</button>
        </div>


    </form>
@endsection
