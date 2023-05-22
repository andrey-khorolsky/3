@extends('layout')


@section('head')
    <link rel="stylesheet" type="text/css" href="/css/for_guest.css">
@endsection


@section('content')

    <form class="guestform" method="post" name="guestform" action="/guest/uploadComments" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <div class="twoinp">
            <input type="file" name="messages">
        </div>

        <button type="submit">Отправить!</button>

    </form>  
      
@endsection
