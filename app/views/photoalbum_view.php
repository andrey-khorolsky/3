
<head>
	<title>Фотоальбом</title>
</head>

<?

$f = fopen("findAllLog.txt", 'a');
$st = microtime(true);
	echo '<div class="phtalb_d">';
	for ($i=0; $i<count($model->photos); $i++)
		echo '<div class="phtalb">
			<img src='.$model->getPhoto($i).' alt='.escapeshellarg($model->getTitle($i)).'>
			<h5>'.$model->getTitle($i).'</h5>
		</div>';
	echo '</div>';

	fwrite($f, "view - ".microtime(true)-$st."\n\n");
	fclose($f);
?>
<script src="../../public/assets/js/firstscript.js"></script>
