function checkguest(){

    let fio = $("#fio");
    let email = $("#email");
    let comm = $("#comm");
    let reFio = /^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/;
    let reEmail = /^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/;

    if (!reFio.test(fio)){
        $(fio).addClass("fieldError");
        return;
    }
    
    $(fio).removeClass("fieldError");
    

    if (!reEmail.test(email)){
        $(email).addClass("fieldError");
        return;
    }
    
    $(email).removeClass("fieldError");

    if (comm.len <= 10){
        $(comm).addClass("fieldError");
        return;
    }
    
    $(comm).removeClass("fieldError");
}