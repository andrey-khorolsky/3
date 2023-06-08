
$(document).ready(function () {
    

    $('button').click(function(){
        let popup = $('<div class="modal_comment"></div>');
        let inp = $('<input type="text" placeholder="Напишите комментарий">');
        let cross = $('<div>X</div>');
        let create = $('<div>Комментировать</div>');

        let articleId = $(this).attr('articleId');


        cross.click(function(){
            popup.remove();
        });

        create.click(function(){

            
            let comment = $(inp).val();
            let data = {comment, articleId};
            let comm = {"_token": $('meta[name="csrf-token"]').attr('content'), data};

            fetch('/blog/addComment',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(comm)
            })
            .then(function(response){
                return(response.json());
            })
            .then(function(res){
                let text = $('<div class="state__text"></div>').text('Последний комментарий от '+res["authorName"]+':').append('<div>'+comment+'</div>');
                $('#forCom_'+articleId).html('').append(text);
                popup.append('<div>Комментарий написан</div>');
                $(inp).val('');
            })
            .catch(error =>
                console.log(error)
            );
        });

        popup.append(cross);
        popup.append(inp);
        popup.append(create);
        $('body').append(popup);
    });


});
