
<head>
	<title>Фотоальбом</title>
</head>

<?
	require_once("app/models/photoalbum_model.php");
	
	echo '<div class="phtalb_d">';
	for ($i=0; $i<count(Photoalbum_model::$fotos); $i++)
		echo '<div class="phtalb">
			<img src=http://web-my-site/public/assets/img/cars/'.Photoalbum_model::$fotos[$i].' alt='.escapeshellarg(Photoalbum_model::$titles[$i]).'>
			<h5>'.Photoalbum_model::$titles[$i].'</h5>
		</div>';
	echo '</div>';
?>
<script src="../../public/assets/js/firstscript.js"></script>
