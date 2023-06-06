@extends('Layouts.layout')


@section('head')
	<title>Аккаунт</title>
	<link rel="stylesheet" href="/css/for_admin.css">
@endsection


@section('content')

	<div class="accountTable">
		@auth
			<div>ФИО: {{ auth()->user()->name}}</div>
			@switch(auth()->user()->role)
				@case('admin')
					<div>Текущая роль: Администратор</div>
					<a class="btn" href="/admin">Панель управления</a>
					@break
				@case('editor')
					<div>Текущая роль: Редактор</div>
					<a class="btn" href="/admin">Панель управления</a>
					@break
				@default
					<div>Текущая роль: Пользователь</div>
			@endswitch
			<a class="btn" href="/account/sign_out">Выйти</a>	
		@endauth

		@guest
			<div>Текущая роль: гость</div>
			<a class="btn" href="/account/sign_in">Войти</a>	
		@endguest
	</div>
	
	<script src="/js/storage.js"></script>
@endsection
		