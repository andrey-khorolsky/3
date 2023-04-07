
	<head>
		<title>Тест</title>
		<script src="/public/assets/js/testscript.js"></script>
	</head>
		
		<form class="test" name="testform" method="POST" onsubmit="return checktest();" action="http://web-my-site/test/check">
			<div class="tstf">
				<label for="fioID">Укажите свои ФИО</label>
				<br>
				<input type="text" id="fioID" name="fio" placeholder="Введите ФИО">
			</div>

			<div class="tstf">
				<label for="groupID">Укажите группу</label>
				<br>
				<select id="groupID" name="group" size="1">
					<option value="0">Выберите группу</option>
					<option value="Pi-20-1">ПИ/б-20-1-о</option>
					<option value="Is-20-1">ИС/б-20-1-о</option>
					<option value="Is-20-2">ИС/б-20-2-о</option>
					<option value="Is-20-3">ИС/б-20-3-о</option>
				</select>
			</div>

			<div class="tstf">
				<label for="hmID">Высшая математика?</label>
				<input type="text" id="hmID" name="hm" placeholder="да / нет">
			</div>

			<div class="tstf">
				<p>Высшая математика?</p>
				<input type="checkbox" id="q21ID" name="q21" value="д">
				<label for="q21ID">д</label>
				<br>
				<input type="checkbox" id="q22ID" name="q22" value="а">
				<label for="q22ID">а</label>
				<br>
				<input type="checkbox" id="q23ID" name="q23" value="н">
				<label for="q23ID">н</label>
				<br>
				<input type="checkbox" id="q24ID" name="q24" value="е">
				<label for="q24ID">е</label>
				<br>
				<input type="checkbox" id="q25ID" name="q25" value="т">
				<label for="q25ID">т</label>
			</div>

			<div class="tstf">
				<label for="lqID">Любимая тема?</label>
				<br>
				<select id="lqID" name="lq" size="1">
					<option value="0">Выберите любимую тему</option>
					<optgroup label="семестр 1">
						<option>легкая тема
						<option>непонятная тема
					</optgroup>
					<optgroup LABEL="семестр 2">
						<option>страшная тема
						<option>скучная тема
					</optgroup>
					<optgroup LABEL="семестр 3">
						<option>легкая тема
						<option>страшная тема
						<option>непонятная тема
					</optgroup>
					<optgroup LABEL="семестр 4">
						<option>интересная тема
						<option>нудная тема
					</optgroup>
					<optgroup LABEL="семестр 5">
						<option>страшная тема
						<option>сложная тема
						<option>нудная тема
					</optgroup>
				</select>
			</div>

			<div class="tstf">
				<button type="submit" id="sendbtn">Send</button>
				<button type="reset">Reset</button>
			</div>
		</form>
		<div class="sch">
			<a href="http://web-my-site/school/">Перейти к разделу "Учеба"</a>
		</div>
