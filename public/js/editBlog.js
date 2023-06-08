
$(document).ready(function () {
    
    $('.editBtn').click(function(){
        let id = $(this).attr('articleId');
        let card = $(".card[id = "+id+"]");
        let title = $('.state__title', card).text();
        let text = $('.state__text', card).text();
        // console.log(title);
        // console.log($('.state__title')[id]);
        let popup = $('<div class="modal_comment"></div>');
        let inpTitle = $('<input type="text" value="'+title+'000">');
        let inpText = $('<input type="text" value="'+text+'">');
        let cross = $('<div>X</div>');
        let create = $('<div>Применить</div>');

        cross.click(function(){
            popup.remove();
        });

        create.click(function(){

            title = $(inpTitle).val();
            text = $(inpText).val();
            let data = {id, title, text};
            // data = JSON.stringify(data);
            let req = {"_token": $('meta[name="csrf-token"]').attr('content'), data};

            console.log(data);

            $.ajax({
                type: "post",
                url: "/blog/editArticle",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });

            // fetch('/blog/editArticle', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json'
            //     },
            //     body: JSON.stringify(data),
            // })
            // .then(function(response){
            //     // console.log(response.json());
            //     return (response.json());
            // })
            // .then(function(res){
            //     console.log(res);
            // })
            // .catch(error =>
            //     console.log(error)
            // );
        });
        

        popup.append(cross);
        popup.append(inpTitle);
        popup.append(inpText);
        popup.append(create);
        $('body').append(popup);
    });
});
