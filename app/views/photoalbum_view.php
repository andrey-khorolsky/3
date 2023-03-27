<? 
	// namespace photoalbum;
?>

<!-- <!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Фотоальбом</title>
		<link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
		<link type="image/x-icon" href="/public/assetsimg/hotdog.ico" rel="icon">
		<script src="/jquery-3.6.1.js"></script>
	</head> -->

	<!-- <body>
		<nav class="nav">
			<ul>
				<li> <a href="http://web-my-site/main/"><img src="">Главная</a></li>
				<li> <a href="http://web-my-site/about/"><img src="">Обо мне</a> </li>
				<li> <a onclick="openMenu();"><img src="">Мои интересы</a></li>
				<li> <a href="http://web-my-site/photoalbum/"><img src="">Фото</a></li>
				<li> <a href="http://web-my-site/contacts/"><img src="">Контакты</a></li>
				<li> <a href="http://web-my-site/test/"><img src="">Тест</a></li>
				<li> <a href="http://web-my-site/history/"><img src="">История</a></li>
			</ul>
		</nav> -->
		
		<head>
			<title>Фотоальбом</title>
		</head>

        <?
			require_once("app/models/photoalbum_model.php");
			
			echo '<div class="phtalb_d">';
			for ($i=0; $i<count(photoalbum\Photoalbum_model::$fotos); $i++)
				echo '<div class="phtalb">
					<img src=http://web-my-site/public/assets/img/cars/'.photoalbum\Photoalbum_model::$fotos[$i].' alt='.escapeshellarg(photoalbum\Photoalbum_model::$titles[$i]).'>
					<h5>'.photoalbum\Photoalbum_model::$titles[$i].'</h5>
				</div>';
			echo '</div>';
		?>
       
		<!-- <script type="text/javascript" src="../../public/assets/js/goods.js"></script> -->
		<!-- <script src="./scripts/contactsIsRight.js"></script> -->
		<script src="../../public/assets/js/firstscript.js"></script>
	<!-- </body>
</html> -->
