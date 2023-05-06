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
    $page = $_GET["page"] ?? 1;
    $articlesOnPage = 3;
    echo $page, $articlesOnPage;
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
    <a href="?page=2">2</a>
</div>
