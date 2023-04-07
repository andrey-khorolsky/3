
<head>
	<title>Фотоальбом</title>
</head>

<?
	echo '<div class="phtalb_d">';
	for ($i=0; $i<count($var->fotos); $i++)
		echo '<div class="phtalb">
			<img src=http://web-my-site/public/assets/img/cars/'.$var->fotos[$i].' alt='.escapeshellarg($var->titles[$i]).'>
			<h5>'.$var->titles[$i].'</h5>
		</div>';
	echo '</div>';
?>
<script src="../../public/assets/js/firstscript.js"></script>
