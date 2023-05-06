<head>
    <title>Гостевая книга</title>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/for_guest.css">
    <script src="/public/assets/js/testguest.js"></script>
</head>

<div class="newcomm">
    <a href="/guest/newComment">Write new</a>
    <a href="/guest/addCommentsFromFile">Add from file</a>
    <a href="/blog/">Блог</a>
</div>

<div class="book">
    <?
    
    foreach($model->getAllComments() as $comment){
        ?>
        <div class="card">
            <h6><?=$comment["date"]?></h6>
            <h3><?=$comment["fio"]?></h3>
            <h5><?=$comment["text"]?></h5>
        </div>
        <?
    }
    ?>
</div>