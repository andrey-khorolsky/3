
<head>
	<title>Фотоальбом</title>
</head>

<?

	echo '<div class="phtalb_d">';
	for ($i=0; $i<count($model->photos); $i++)
		echo '<div class="phtalb">
			<img src='.$model->getPhoto($i).' alt='.escapeshellarg($model->getTitle($i)).'>
			<h5>'.$model->getTitle($i).'</h5>
		</div>';
	echo '</div>';

?>
<script src="../../public/assets/js/firstscript.js"></script>
