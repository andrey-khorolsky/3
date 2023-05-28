@extends('Layouts.admin_layout')


@section('head')
@endsection


@section('content')
    <?
        $page = $_GET["page"] ?? 1;
        $pageCount = $model->getPagesCount();
    ?>

    <table>
        <tr>
            <th>Дата</th>
            <th>Страница</th>
            <th>IP</th>
            <th>Хост посетителя</th>
            <th>Браузер</th>
        </tr>

        @foreach ($model->getStatistic() as $stat)
            <tr>
                <td>{{$stat->date}}</td>
                <td>{{$stat->page}}</td>
                <td>{{$stat->ip}}</td>
                <td>{{$stat->visitor_host}}</td>
                <td>{{$stat->browser}}</td>
            </tr>
        @endforeach
    </table>

    <div class="pages">
        <a href="statistic">Первая страница</a>

        <?= $page-2 > 0 ? "<a href='?page=".($page-2)."'>".($page-2)."</a>" : ""?>
        <?= $page-1 > 0 ? "<a href='?page=".($page-1)."'>".($page-1)."</a>" : ""?>
        <a id="curPage"><?=$page?></a>
        <?= $page+1 <= $pageCount ? "<a href='?page=".($page+1)."'>".($page+1)."</a>" : ""?>
        <?= $page+2 <= $pageCount ? "<a href='?page=".($page+2)."'>".($page+2)."</a>" : ""?>

        <a href="?page=<?=$pageCount?>">Последняя страница</a>

        <br>
        <span>Всего страниц:<a href="?page=<?=$pageCount?>"><?=$pageCount?></a></span>
    </div>
@endsection
