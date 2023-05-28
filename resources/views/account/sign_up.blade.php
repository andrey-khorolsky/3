@extends('Layouts.layout')


@section('head')
    <title>Регистрация</title>
	<link rel="stylesheet" href="/css/for_admin.css">
@endsection


@section('content')

    <a class="btn" href="/account">Назад</a>
    
    @if ($errors->any())
		<div class="alert alert-danger">
			<div class="test">
				@foreach ($errors->all() as $error)
					<div class="tstf">{{ $error }}</div>
				@endforeach
			</div>
		</div>
	@endif

    <form action="/account/sign_up" method="post">
        @csrf
        
        <label for="name">Имя</label>
        <input type="text" name="name" id="name">

        <label for="email">Email</label>
        <input type="text" name="email" id="email">

        <label for="password">Password</label>
        <input type="text" name="password" id="password">
        
        <button type="submit">Зарегистрироваться</button>
    </form>
    
    <a class="btn" href="/account/sign_in">Вход</a>
@endsection
