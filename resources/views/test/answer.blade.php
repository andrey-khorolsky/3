@extends('layout')


@section('content')
    <div calss="test">
        <br>
        <p>Ответ отправлен</p>
        <p>Ответы:</p>
        <p>ФИО: <?= $model->getFio()?></p>
        <p>Группа: <?= $model->getGroup()?></p>
        <p>Высшая математика: <?= $model->getHm()?></p>
        <p>Высшая математика: <?= $model->getQ2()?></p>
        <p>Любимая тема: <?= $model->getLq()?></p>
        <br>
        
        <p>Итог: <?= $model->getRes(0)?> из 3</p>
        <p>Высшая математика: <?= $model->getRes(1)?> баллов</p>
        <p>Высшая математика: <?= $model->getRes(2)?> баллов</p>
        <p>Любимая тема: <?= $model->getRes(3)?> баллов</p>
            
        <div class="sch">
            <a href="/test">Отправить еще</a>
        </div>

        <!-- last 5 answers if user authorized-->
        @if (session("auth"))

            <div class="tbl">
                <table>
                    <caption>Последние 5 ответов пользователей</caption>

                    <tbody>
                        <tr>
                            <th>Пользователь</th>
                            <th>Высшая математика</th>
                            <th>балл</th>
                            <th>Высшая математика</th>
                            <th>балл</th>
                            <th>Любимая тема</th>
                            <th>балл</th>
                            <th>Итого баллов</th>
                        </tr>

                        <?
                        $model->findLastAnswers(5);
                        $ans = $model->getAnswersAR();
                        if (!is_null($ans))
                            foreach($ans as $answer){
                                ?>
                                <tr>
                                    <td><?=$answer->getFio();?></td>
                                    <td><?=$answer->getAnswer1();?></td>
                                    <td><?=$answer->getMark1();?></td>
                                    <td><?=$answer->getAnswer2();?></td>
                                    <td><?=$answer->getMark2();?></td>
                                    <td><?=$answer->getAnswer3();?></td>
                                    <td><?=$answer->getMark3();?></td>
                                    <td><?=$answer->getRes();?></td>
                                </tr>
                                <?
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        @endif

    </div>

@endsection
