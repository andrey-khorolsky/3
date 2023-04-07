<div calss="test">
    <!-- <div class="tstf"> -->
        <p>Ответ отправлен</p>
        <p>Ответы:</p>
        <p>ФИО: <?echo $_POST["fio"]?></p>
        <p>Группа: <?echo $_POST["group"]?></p>
        <p>Высшая математика: <?echo $_POST["hm"]?></p>
        <p>Высшая математика: <?echo $_POST["q2"]?></p>
        <p>Любимая тема: <?echo $_POST["lq"]?></p>
        <!-- <br> -->
        <?$var->verificationResults($_POST)?>
    <!-- </div> -->
    <div class="sch">
        <a href="http://web-my-site/test/">Отправить еще</a>
    </div>
</div>