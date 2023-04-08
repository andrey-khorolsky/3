
<head>
	<title>Фотоальбом</title>
</head>

<?
	echo '<div class="phtalb_d">';
	for ($i=0; $i<count($var->photos); $i++)
		echo '<div class="phtalb">
			<img src='.$var->getPhoto($i).' alt='.escapeshellarg($var->getTitle($i)).'>
			<h5>'.$var->getTitle($i).'</h5>
		</div>';
	echo '</div>';
?>
<script src="../../public/assets/js/firstscript.js"></script>
