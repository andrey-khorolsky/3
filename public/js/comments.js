
$(document).ready(function () {
    

    $('.commentBtn').click(function(){
        let popup = $('<div class="modal_comment"></div>');
        let form = $('<form id="commentForm"></form>');
        let inpText = $('<input type="text" placeholder="Напишите комментарий">');
        let inpImg = $('<input type="file">');
        let cross = $('<div>X</div>');
        let create = $('<div>Комментировать</div>');

        let articleId = $(this).attr('articleId');


        cross.click(function(){
            popup.remove();
        });

        create.click(function(){

            let a = $(inpImg);
            let comment = $(inpText).val();
            console.log($(a)[0].files[0]);

            let formdata = new FormData;
            formdata.append('articleId', articleId);
            formdata.append('comment', $(inpText).val());
            formdata.append('img', $(a)[0].files[0]);
            formdata.append("_token", $('meta[name="csrf-token"]').attr('content'));
            

            fetch('/blog/addComment',{
                method: 'POST',
                body: formdata
            })
            .then(function(response){
                console.log(response);
                return response.json();
            })
            .then(function(res){
                console.log(res);
                let img = null;
                if (res['image']){
                    img = $('<img class="state__comment"></img>').attr('src', res['image']);
                }
                let text = $('<div class="state__comment"></div>').text('Последний комментарий от '+res["authorName"]+':').append('<div>'+comment+'</div>').append(img);
                $('#forCom_'+articleId).html('').append(text);
                popup.append('<div>Комментарий написан</div>');
                $(inpText).val('');
            })
            .catch(error =>
                console.log(error)
            );
        });

        form.append(inpText);
        form.append(inpImg);

        popup.append(cross);
        popup.append(form);
        popup.append(create);
        $('body').append(popup);
    });


});
