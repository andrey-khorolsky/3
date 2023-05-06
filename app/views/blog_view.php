<head>
    <title>Блог</title>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/for_blog.css">
</head>


<div class="newcomm">
    <a href="/blog/newArticle">Write new</a>
    <!-- <a href="/guest/addCommentsFromFile">Add from file</a> -->
    <a href="/guest/">Гостевая книга</a>
</div>

<div class="book">
    <?
    $articlesOnPage = 3;
    $page = $_GET["page"] ?? 1;
    $pageCount = ceil($model->getPagesCount()/$articlesOnPage);
    
    foreach($model->getArticles(($page-1)*3, $articlesOnPage) as $article){
        ?>
        <div class="card">
            <h6><?=$article->getDate()?></h6>
            <h5><?=$article->getTitle()?></h5>
            <h6><?=$article->getText()?></h6>
            <?=$article->getImg() != null ? "<img src='".$article->getImg()."'>" : ""?>
        </div>
        <?
    }
    ?>
</div>

<div class="pages">
    <a href="/blog/">Первая страница</a>

    <?= $page-2 > 0 ? "<a href='?page=".($page-2)."'>".($page-2)."</a>" : ""?>
    <?= $page-1 > 0 ? "<a href='?page=".($page-1)."'>".($page-1)."</a>" : ""?>
    <a><?=$page?></a>
    <?= $page+1 <= $pageCount ? "<a href='?page=".($page+1)."'>".($page+1)."</a>" : ""?>
    <?= $page+2 <= $pageCount ? "<a href='?page=".($page+2)."'>".($page+2)."</a>" : ""?>

    <a href="?page=<?=$pageCount?>">Последняя страница</a>

    <span>Всего страниц:<a href="?page=<?=$pageCount?>"><?=$pageCount?></a></span>
</div>
