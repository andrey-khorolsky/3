@extends('Layouts.layout')


@section('head')
    <title>Вход</title>
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

    @if (session("trouble_with_login"))
        <div class="alert alert-danger">
            <div class="test">
                <div class="tstf">{{ session("trouble_with_login") }}</div>
            </div>
        </div>
    @endif

    <form action="/account/sign_in" method="post">
        @csrf
        
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ old("email") }}">

        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="{{ old("password") }}">
        
        <button type="submit">Войти!</button>
    </form>

        <a class="btn" href="/account/sign_up">Регистрация</a>
@endsection
