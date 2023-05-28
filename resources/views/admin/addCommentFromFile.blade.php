@extends('Layouts.admin_layout')


@section('head')
    <link rel="stylesheet" type="text/css" href="/css/for_admin.css">
@endsection


@section('content')


    {{ $uploadStatus ?? "Выберите файл в текстовом формате" }}

    <form class="guestform" method="post" name="guestform" action="/admin/uploadComments" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <div class="twoinp">
            <input type="file" name="messages" value="{{ old('messages') }}">
        </div>

        <button type="submit">Отправить!</button>

    </form>  
      
@endsection
