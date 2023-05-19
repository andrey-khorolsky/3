@extends('layout')

@section('content')
	<head>
		<title>Контакты</title>
		<script src="/js/testscript.js"></script>
	</head>

	@if ($errors->any())
		<div class="alert alert-danger">
			<div class="test">
				@foreach ($errors->all() as $error)
					<div class="tstf">{{ $error }}</div>
				@endforeach
			</div>
		</div>
	@endif

	<form class="test" method="POST" name="contform" onsubmit="return checkcont();" action="/contacts">
		@csrf
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="tstf">
			<label for="fioID">Укажите свои ФИО</label>
			<br>
			<input class="contData" type="text" id="fioID" name="fio" placeholder="Введите ФИО">
		</div>

		<div class="tstf" id="forcal">
			<label for="bitrhID">Укажите дату рождения</label>
			<br>
			<input class="contData" id="birthID" name="birth" placeholder="01.01.2022" readonly>
		</div>

		<div class="tstf">
			<p>Укажите свой пол:</p>
			<br>
			<label for="s1ID"><input type="radio" name="sex" id="s1ID" value="men">Men</label>
			<label for="s2ID"><input type="radio" name="sex" id="s2ID" value="women">Women</label>
		</div>

		<div class="tstf">
			<label for="ageID">Укажите свой возраст:</label>
			<br>
			<select class="contData" id="ageID" name="age" size="1">
				<option value="">Укажите свой возраст</option>
				<option>&lt;14</option>
				<option>14 - 18</option>
				<option>19 - 40</option>
				<option>41 - 60</option>
				<option>>60</option>
			</select>
		</div>

		<div class="tstf">
			<label for="emailID">Укажите свой Email:</label>
			<br>
			<input class="contData" type="email" id="emailID" name="email" placeholder="Введите Email">
		</div>

		<div class="tstf">
			<label for="telID">Укажите свой номер телефона:</label>
			<br>
			<input class="contData" type="tel" id="telID" name="tel" placeholder="Введите номер телефона">
		</div>

		<div class="buttons">
			<button type="submit" id="sbb" disabled>Send</button>
			<button type="reset">Reset</button>
		</div>

		<div class="policy">
			Политика конфиденциальности
		</div>
	</form>
	
	<script src="/js/calendar.js"></script>
	<script src="/js/contactsIsRight.js"></script>
@endsection
	