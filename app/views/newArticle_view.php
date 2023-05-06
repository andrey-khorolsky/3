<head>    
    <link rel="stylesheet" type="text/css" href="/public/assets/css/for_guest.css">
</head>

<form class="guestform" method="post" enctype="multipart/form-data" name="guestform" onsubmit="return checkguest();" action="/blog/create">
    
    <div class="twoinp">
        <input type="text" id="title" name="title" placeholder="Title">
        <textarea cols="50" rows="4" type="text" id="text" name="text" placeholder="Text"></textarea>
        <input type="file" id="file" name="file">
    </div>

    <button type="submit">Отправить!</button>

</form>