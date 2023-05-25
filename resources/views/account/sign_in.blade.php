@extends('layouts.layout')


@section('head')
    <title>Вход</title>
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
        <a href="/account/sign_up">Регистрация</a>
@endsection
