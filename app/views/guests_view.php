<head>
    <title>Гостевая книга</title>
    <script src="/public/assets/js/testguest.js"></script>
</head>

<form class="guestform" method="post" name="guestform" onsubmit="return checkguest();" action="/contacts/check">
    
    <div class="twoinp">
        <input type="text" id="fio" name="fio" placeholder="Фамилия Имя Отчество">
        <input type="text" id="email" name="email" placeholder="email@email.com">
    </div>

    <div>
        <textarea cols="50" rows="4" placeholder="Напишите тут свой отзыв"></textarea>
    </div>

</form>