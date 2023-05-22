@extends('layout')


@section("head")
	<title>Учёба</title>
@endsection


@section('content')

	<div id="tblhead">
		<h4>Севастопольский Государственный Университет</h4>
		<h4>Институт информационных технологий и управления в технических системах</h4>
	</div>
	
	<div class="tbl">
		<table>
			<caption>План учебного процесса</caption>
			<tbody>
				<tr>
					<th rowspan="2">№</th>
					<th rowspan="2">Дисциплина</th>
					<th rowspan="2">Кафедра</th>
					<th colspan="6">Всего часов</th>
				</tr>
				<tr>
					<th>всего</th>
					<th>ауд</th>
					<th>лекции</th>
					<th>лаб</th>
					<th>практические</th>
					<th>СРС</th>
				</tr>

				<tr>
					<th>1</th>
					<td>Экология</td>
					<td>БЖ</td>
					<td>54</td>
					<td>27</td>
					<td>18</td>
					<td>0</td>
					<td>9</td>
					<td>27</td>
				</tr>

				<tr>
					<th>2</th>
					<td>Высшая математика</td>
					<td>ВМ</td>
					<td>540</td>
					<td>282</td>
					<td>141</td>
					<td>0</td>
					<td>141</td>
					<td>258</td>
				</tr>

				<tr>
					<th>3</th>
					<td>Русский язык и культура речи</td>
					<td>НГиГ</td>
					<td>108</td>
					<td>54</td>
					<td>18</td>
					<td>0</td>
					<td>36</td>
					<td>54</td>
				</tr>

				<tr>
					<th>4</th>
					<td>Основы дискретной метематики</td>
					<td>ИС</td>
					<td>216</td>
					<td>87</td>
					<td>139</td>
					<td>0</td>
					<td>52</td>
					<td>77</td>
				</tr>

				<tr>
					<th>5</th>
					<td>Основы программирования и алгоритмические языки</td>
					<td>ИС</td>
					<td>405</td>
					<td>210</td>
					<td>105</td>
					<td>87</td>
					<td>18</td>
					<td>195</td>
				</tr>

				<tr>
					<th>6</th>
					<td>Основы экологии</td>
					<td>ПЭОП</td>
					<td>54</td>
					<td>27</td>
					<td>18</td>
					<td>0</td>
					<td>9</td>
					<td>27</td>
				</tr>

				<tr>
					<th>7</th>
					<td>Теория вероятностей и математическая статистика</td>
					<td>ИС</td>
					<td>162</td>
					<td>72</td>
					<td>54</td>
					<td>18</td>
					<td>0</td>
					<td>90</td>
				</tr>

				<tr>
					<th>8</th>
					<td>Физика</td>
					<td>Физики</td>
					<td>324</td>
					<td>194</td>
					<td>106</td>
					<td>88</td>
					<td>0</td>
					<td>130</td>
				</tr>

				<tr>
					<th>9</th>
					<td>Основы электротехники и электроники</td>
					<td>ИС</td>
					<td>108</td>
					<td>72</td>
					<td>36</td>
					<td>18</td>
					<td>18</td>
					<td>36</td>
				</tr>

				<tr>
					<th>10</th>
					<td>Численные методы в информатике</td>
					<td>ИС</td>
					<td>189</td>
					<td>89</td>
					<td>36</td>
					<td>36</td>
					<td>17</td>
					<td>100</td>
				</tr>

				<tr>
					<th>11</th>
					<td>Методы исследования операций</td>
					<td>ИС</td>
					<td>216</td>
					<td>104</td>
					<td>52</td>
					<td>35</td>
					<td>17</td>
					<td>112</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection
	