
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
		<? showHobby("music", $var);?>
	</section>
	
	<section id="sctn2">
		<h1>Книги</h1>
		<? showHobby("books", $var);?>
	</section>

	<section id="sctn3">
		<h1>Фильмы</h1>
		<? showHobby("films", $var);?>
	</section>

	<section id="sctn4">
		<h1>Игры</h1>
		<? showHobby("games", $var);?>
	</section>
</div>

<?
	function showHobby($section, $model){

        if ($section === "music"){
            for ($i=0; $i<count($model->$section); $i++){
                echo '<div class="album">
                        <img src='.$model->music[$i]["cover"].'>
                        <h4>'.$model->music[$i]["titles"].'</h4>
                        <h4>'.$model->music[$i]["artist"].'</h4>
                    </div>';
            };
        } else {
            for ($i=0; $i<count($model->$section); $i++){
                echo '<div class="album">
                        <img src='.$model->$section[$i]["cover"].'>
                        <h4>'.$model->$section[$i]["titles"].'</h4>
                        <h4>'.$model->$section[$i]["artist"].'</h4>
                        <h5>'.$model->$section[$i]["disctiption"].'</h5>
                    </div>';
            };
        }
    }
