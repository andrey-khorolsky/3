<!-- <!DOCTYPE html>
<html lang="ru"> -->
	<head>
		<!-- <meta charset="utf-8">
		<title>Контакты</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link type="image/x-icon" href="img/hotdog.ico" rel="icon"> -->
		<script src="/public/assets/js/testscript.js"></script>
		<!-- <script src="../../jquery-3.6.1.js"></script> -->
	</head>

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

		<form class="test" method="post" name="contform" onsubmit="return checkcont();" action="mailto:horolskyandrey@gmail.com">
			<div class="tstf">
				<label for="fioID">Укажите свои ФИО</label>
				<br>
				<input class="contData" type="text" id="fioID" name="fio" placeholder="Введите ФИО">
			</div>

			<div class="tstf" id="forcal">
				<label for="bitrhID">Укажите дату рождения</label>
				<br>
				<input class="contData" id="birthID" name="birth" placeholder="01.01.2022" readonly>
			</div>

			<div class="tstf">
				<p>Укажите свой пол:</p>
				<br>
				<label for="s1ID"><input type="radio" name="sex" id="s1ID">Men</label>
				<label for="s2ID"><input type="radio" name="sex" id="s2ID">Women</label>
			</div>

			<div class="tstf">
				<label for="ageID">Укажите свой возраст:</label>
				<br>
				<select class="contData" id="ageID" name="age" size="1">
					<option value="">Укажите свой возраст</option>
					<option>&lt;14</option>
					<option>14 - 18</option>
					<option>19 - 40</option>
					<option>41 - 60</option>
					<option>>60</option>
				</select>
			</div>

			<div class="tstf">
				<label for="emailID">Укажите свой Email:</label>
				<br>
				<input class="contData" type="email" id="emailID" name="email" placeholder="Введите Email">
			</div>

			<div class="tstf">
				<label for="telID">Укажите свой номер телефона:</label>
				<br>
				<input class="contData" type="tel" id="telID" name="tel" placeholder="Введите номер телефона">
			</div>

			<div class="buttons">
				<button type="submit" id="sbb" disabled>Send</button>
				<button type="reset">Reset</button>
			</div>

			<div class="policy">
				Политика конфиденциальности
			</div>
		</form>
		
		<!-- <script src="scripts/goods.js"></script> -->
		<script src="/public/assets/js/calendar.js"></script>
		<script src="/public/assets/js/contactsIsRight.js"></script>
	<!-- </body>
</html> -->
