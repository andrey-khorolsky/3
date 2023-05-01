<div calss="test">
        <p>Ответ отправлен</p>
        <p>Ответы:</p>
        <p>ФИО: <?echo $model->getFio()?></p>
        <p>Группа: <?echo $model->getGroup()?></p>
        <p>Высшая математика: <?echo $model->getHm()?></p>
        <p>Высшая математика: <?echo $model->getQ2()?></p>
        <p>Любимая тема: <?echo $model->getLq()?></p>
        <br>
        
        <p>Итог: <?= $model->getRes(0)?> из 3</p>
        <p>Высшая математика: <?= $model->getRes(1)?> баллов</p>
        <p>Высшая математика: <?= $model->getRes(2)?> баллов</p>
        <p>Любимая тема: <?= $model->getRes(3)?> баллов</p>
        
    <div class="sch">
        <a href="/test/">Отправить еще</a>
    </div>
</div>