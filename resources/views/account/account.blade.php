@extends('layout')


@section('head')
	<title>Аккаунт</title>
	<link rel="stylesheet" href="/css/for_admin.css">
@endsection


@section('content')
<?
// session(["auth" => "true", "userName" => "Андрей"]);
// session()->forget(["admin", "auth", "userName"]);
?>
	<div class="accountTable">
		@if (session("auth"))
			<div>ФИО: {{session("userName")}}</div>
			@if (session("admin"))
				<div>Текущая роль: Администратор</div>
			@else
				<div>Текущая роль: Пользователь</div>
			@endif
			<a class="btn" href="/account/sign_out">Выйти</a>
		@else
			<div>Текущая роль: гость</div>
			<a class="btn" href="/account/sign_in">Войти</a>
		@endif
	</div>
	
	<script src="/js/storage.js"></script>
@endsection
		