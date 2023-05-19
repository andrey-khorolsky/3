@extends('layout')

@section('content')
	<head>
		<title>Фотоальбом</title>
	</head>

	<?

		echo '<div class="phtalb_d">';
		foreach ($model->photos as $photo)
			echo '<div class="phtalb">
				<img src='.$photo->photo.' alt='.escapeshellarg($photo->title).'>
				<h5>'.$photo->title.'</h5>
			</div>';
		echo '</div>';

	?>
	
	<script src="/js/firstscript.js"></script>
@endsection
