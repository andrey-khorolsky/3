<head>    
    <link rel="stylesheet" type="text/css" href="/public/assets/css/for_guest.css">
</head>

<form class="guestform" method="post" name="guestform" onsubmit="return checkguest();" action="/guest/create">
    
    <div class="twoinp">
        <input type="text" id="fio" name="fio" placeholder="Фамилия Имя Отчество">
        <input type="text" id="email" name="email" placeholder="email@email.com">
    </div>

    <div>
        <textarea cols="50" rows="4" name="text" placeholder="Напишите тут свой отзыв"></textarea>
    </div>

    <button type="submit">Отправить!</button>

</form>