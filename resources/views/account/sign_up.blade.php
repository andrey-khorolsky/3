@extends('Layouts.layout')


@section('head')
    <title>Регистрация</title>
	<link rel="stylesheet" href="/css/for_admin.css">
    <script src="/public/js/registr.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

    <form id="regForm" action="/account/sign_up" method="post">
        @csrf
		{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
        
        <label for="name">Имя</label>
        <input type="text" name="name" id="name">

        <label for="email">Email</label>
        <input type="text" name="email" id="email">

        <label for="password">Password</label>
        <input type="text" name="password" id="password">
        
        <button id="subB" type="submit" disabled>Зарегистрироваться</button>
    </form>
    
    <a class="btn" href="/account/sign_in">Вход</a>

    <div>
        <span id="regMsg"></span>

        @if (isset($registration))
            <div>{{$registration}}</div>
        @endif
    </div>

@endsection
