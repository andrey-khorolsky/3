
$(document).ready(function () {
    
    $('.editBtn').click(function(){
        let id = $(this).attr('articleId');
        let card = $(".card[id = "+id+"]");
        let title = $('.state__title', card).text();
        let text = $('.state__text', card).text();
        
        let popup = $('<div class="modal_comment"></div>');
        let inpTitle = $('<input type="text" value="'+title+'">');
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
            let req = {"_token": $('meta[name="csrf-token"]').attr('content'), data};

            $.ajax({
                type: "post",
                url: "/blog/editArticle",
                data: req,
                dataType: "json",
                success: function (response) {
                    $('.state__title', card).text(title);
                    $('.state__text', card).text(text);
                    popup.remove();
                },
                error: function (jqXHR, exception) {
                    if (jqXHR.status === 0) {
                        console.log('Not connect. Verify Network.-');
                    } else if (jqXHR.status == 404) {
                        console.log('Requested page not found (404).-');
                    } else if (jqXHR.status == 500) {
                        console.log('Internal Server Error (500).-');
                    } else if (exception === 'parsererror') {
                        console.log('Requested JSON parse failed.-');
                    } else if (exception === 'timeout') {
                        console.log('Time out error.-');
                    } else if (exception === 'abort') {
                        console.log('Ajax request aborted.-');
                    } else {
                        console.log('Uncaught Error. ' + jqXHR.responseText);
                    }
                }
            });

        });
        

        popup.append(cross);
        popup.append(inpTitle);
        popup.append(inpText);
        popup.append(create);
        $('body').append(popup);
    });
});
