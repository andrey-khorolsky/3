
$(document).ready(function () {

    $('#email').blur(function(){

        let formData = $('#email').serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/account/canRegistr",
            data: formData,
            dataType: 'json',
            processData: false,
            success: function (response) {
                let msg;
                
                if (response['errvalid']){
                    if (response['res'] == 0){
                        msg = false;
                    } else {
                        msg = 'Данная почта занята';
                    }
                } else {
                    msg = 'Неверный формат почты';
                }

                if (!msg){
                    $('#subB').removeAttr('disabled');
                    $('#regMsg').text('');
                }
                else{
                    $('#subB').attr('disabled', true);
                    $('#regMsg').text(msg);
                }

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
        
});
