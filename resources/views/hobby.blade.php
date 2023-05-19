@extends('layout')

@section('content')
	<head>
		<title>Мои интересы</title>
	</head>

	<nav class="nav_sctn">
		<a id="sc1" href="#sctn1">Музыка</a>
		<a id="sc2" href="#sctn2">Книги</a>
		<a id="sc3" href="#sctn3">Фильмы</a>
		<a id="sc4" href="#sctn4">Игры</a>
	</nav>

	<div class = "sec_hobby">
		<section id="sctn1">
			<h1>Музыка</h1>
			<? showHobby("music", $model);?>
		</section>
		
		<section id="sctn2">
			<h1>Книги</h1>
			<? showHobby("books", $model);?>
		</section>

		<section id="sctn3">
			<h1>Фильмы</h1>
			<? showHobby("films", $model);?>
		</section>

		<section id="sctn4">
			<h1>Игры</h1>
			<? showHobby("games", $model);?>
		</section>
	</div>

	<?
		function showHobby($section, $model){

			if ($section === "music"){
				// for ($i=0; $i<count($model->$section); $i++){
				foreach ($model->$section as $fav) {
					echo '<div class="album">
							<img src='.$fav["cover"].'>
							<h4>'.$fav["title"].'</h4>
							<h4>'.$fav["artist"].'</h4>
						</div>';
				};
			} else {
				// for ($i=0; $i<count($model->$section); $i++){
				foreach ($model->$section as $fav) {
					echo '<div class="album">
							<img src='.$fav["cover"].'>
							<h4>'.$fav["title"].'</h4>
							<h4>'.($fav["artist"] ?? $fav["type"]).'</h4>
							<h5>'.$fav["disc"].'</h5>
						</div>';
				};
			}
		}
	?>
@endsection
