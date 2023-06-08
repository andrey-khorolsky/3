@extends('Layouts.layout')


@section("head")
    <title>Блог</title>
    <link rel="stylesheet" type="text/css" href="/css/for_blog.css">
    <script src="/public/js/comments.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection


@section('content')
    <div class="newcomm">
        <a href="/guest">Гостевая книга</a>
    </div>

    <div class="book">
        <?
        $articlesOnPage = 3;
        $page = $_GET["page"] ?? 1;
        $pageCount = ceil($model->getPagesCount()/$articlesOnPage);
        
        foreach($model->getArticles($articlesOnPage) as $article){
        ?>
            <div class="card">
                <div class="card__row">
                    <div class="state__date"><?=$article->date?></div>
                    <div class="state__title"><?=$article->title?></div>
                    <div class="state__text"><?=$article->text?></div>

                    <div id="forCom_{{$article->id}}">
                        @if ($model->hasComment($article->id))
                            <div class="state__text">
                                Последний комментарий от {{$model->getLastCommentAuthor($article->id)}}:
                                <?='<div>'.$model->getLastComment($article->id).'</div>'?>
                            </div>
                        @endif
                    </div>
                   

                    @auth
                        <button articleId='{{$article->id}}'>Комментировать</button>
                    @endauth
                </div>

                <?=$article->img != null ? "<img src='".$article->img."'>" : ""?>
                <?=$article->video != null ?
                    '<iframe src="'.$article->video.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>' : ""?>
                
            </div>
            <?
        }
        ?>
    </div>

    <div class="pages">
        <a href="blog">Первая страница</a>

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
