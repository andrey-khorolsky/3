@extends('Layouts.layout')


@section('head')
	<title>Тест</title>
	<script src="/js/testscript.js"></script>
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

	<form class="test" name="testform" method="POST" onsubmit="return checktest();" action="/test">
		@csrf
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="tstf">
			<label for="fioID">Укажите свои ФИО</label>
			<br>
			<input type="text" id="fioID" name="fio" placeholder="Введите ФИО" value="{{ old('fio') }}" >
		</div>

		<div class="tstf">
			<label for="groupID">Укажите группу</label>
			<br>
			<select id="groupID" name="group" size="1">
				<option value="0">Выберите группу</option>
				<option value="Pi-20-1">ПИ/б-20-1-о</option>
				<option value="Is-20-1">ИС/б-20-1-о</option>
				<option value="Is-20-2">ИС/б-20-2-о</option>
				<option value="Is-20-3">ИС/б-20-3-о</option>
			</select>
		</div>

		<div class="tstf">
			<label for="hmID">Высшая математика?</label>
			<input type="text" id="hmID" name="hm" placeholder="да / нет" value="{{ old('hm') }}">
		</div>

		<div class="tstf">
			<p>Высшая математика?</p>
			<input type="checkbox" id="q21ID" name="q21" value="д" @checked(old('q21'))>
			<label for="q21ID">д</label>
			<br>
			<input type="checkbox" id="q22ID" name="q22" value="а" @checked(old('q22'))>
			<label for="q22ID">а</label>
			<br>
			<input type="checkbox" id="q23ID" name="q23" value="н" @checked(old('q23'))>
			<label for="q23ID">н</label>
			<br>
			<input type="checkbox" id="q24ID" name="q24" value="е" @checked(old('q24'))>
			<label for="q24ID">е</label>
			<br>
			<input type="checkbox" id="q25ID" name="q25" value="т" @checked(old('q25'))>
			<label for="q25ID">т</label>
		</div>

		<div class="tstf">
			<label for="lqID">Любимая тема?</label>
			<br>
			<select id="lqID" name="lq" size="1">
				<option value="">Выберите любимую тему</option>
				<optgroup label="семестр 1">
					<? printLq("lq","легкая тема", "непонятная тема")?>
				</optgroup>
				<optgroup LABEL="семестр 2">
					<? printLq("lq","страшная тема", "скучная тема")?>
				</optgroup>
				<optgroup LABEL="семестр 3">
					<? printLq("lq","легкая тема", "страшная тема", "непонятная тема")?>
				</optgroup>
				<optgroup LABEL="семестр 4">
					<? printLq("lq","интересная тема", "нудная тема")?>
				</optgroup>
				<optgroup LABEL="семестр 5">
					<? printLq("lq","страшная тема", "сложная тема", "нудная тема")?>
				</optgroup>
			</select>
		</div>

		<div class="tstf">
			<button type="submit" id="sendbtn">Send</button>
			<button type="reset">Reset</button>
		</div>
	</form>
	
	<div class="sch">
		<a href="/school/">Перейти к разделу "Учеба"</a>
	</div>

	<?
		function printLq($name, ...$topic){
			foreach ($topic as $top)
				echo '<option '.(isset($_POST[$name]) && $_POST[$name] == $top ? "selected" : null).'>'.$top;
		}
	?>

@endsection
