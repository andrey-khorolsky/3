
// проверка на кол-во правильно заполненных полей
function openBut(){
    if ($(".fieldRight").length < 5)
        $("#sbb").attr("disabled", true);
    else
        $("#sbb").removeAttr("disabled");
}


// добавление ошибки возле поля, добавление класса ошибки к полю
function addErrorDiv(place, textError){
    let divErr = $("<div class='contactsError'></div>");
    divErr.text(textError);
    $(place).parent().append(divErr);
    $(place).removeClass("fieldRight");
    $(place).addClass("fieldError");
    openBut();
}


// добавление слушателя к полю ФИО
$("#fioID").blur(function(e){
    let re = /^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/;
    let divErr = $(".contactsError").get(0);
    let flag = (divErr) ? true : false;

    if ($(this).val() == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не заполнили ФИО");
        return;
    }

    if (!re.test($(this).val())){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы неправильно заполнили ФИО");
        return;
    }

    if (flag) divErr.remove();
    $(this).removeClass("fieldError");
    $(this).addClass("fieldRight");
    openBut();
});


// добавление слушателя к полю дата рождения
$("#birthID").blur(function(e){
    let divErr = $(".contactsError").get(0);
    let flag = (divErr) ? true : false;

    if ($(this).val() == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не заполнили дату рождения");
        return;
    }

    if (flag) divErr.remove();
    $(this).removeClass("fieldError");
    $(this).addClass("fieldRight");
    openBut();
});


// добавление слушателя к полю возраст
$("#ageID").blur(function(e){
    let divErr = $(".contactsError").get(0);
    let flag = (divErr) ? true : false;

    if ($(this).val() == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не выбрали возраст");
        return;
    }

    if (flag) divErr.remove();
    $(this).removeClass("fieldError");
    $(this).addClass("fieldRight");
    openBut();
});


// добавление слушателя к полю email
$("#emailID").blur(function(e){
    let re = /^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/;
    let divErr = $(".contactsError").get(0);
    let flag = (divErr) ? true : false;

    if ($(this).val() == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не ввели почту");
        return;
    }

    if (!re.test($(this).val())){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы неправильно заполнили почту");
        return;
    }

    if (flag) divErr.remove();
    $(this).removeClass("fieldError");
    $(this).addClass("fieldRight");
    openBut();
});


// добавление слушателя к полю номер телефона
$("#telID").blur(function(e){
    let re = /^\+[37][0-9]{9,11}$/;
    let divErr = $(".contactsError").get(0);
    let flag = (divErr) ? true : false;

    if ($(this).val() == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не ввели номер телефона");
        return;
    }

    if (!re.test($(this).val())){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы неправильно ввели номер телефона");
        return;
    }

    if (flag) divErr.remove();
    $(this).removeClass("fieldError");
    $(this).addClass("fieldRight");
    openBut();
});


popover("#telID", "shawty callin on my phone, i dont pick it up");


//popover
function popover(element, textd){
    $(element).attr("inform", textd);
    $(element).attr("popexist", 'f');

    $(element).mouseover(function(){

        if ($(this).attr("popexist") == 't') return;

        if ($(".ppvr")) $(".ppvr").remove();

        let pop = $("<div class='ppvr'></div>");
        pop.text($(this).attr("inform"));
        $(this).parent().append(pop);

        let offs = $(this).offset();
        
        if (offs.left > $(window).width()*0.5)
            $(pop).css( "margin-left", (-$(this).width()*0.5)-($(pop).width())-10);
            
        if (offs.left < $(window).width()*0.5)
            $(pop).css( "margin-left", ($(this).width()*0.5));

        if (offs.top > $(window).height()*0.5)
            $(pop).css( "margin-top", (-$(this).height())-($(pop).height())-10);
            
        if (offs.top < $(window).height()*0.5)
            $(pop).css( "margin-top", (offs.top+$(this).height()-$(pop).height()-$(pop).offset().top-10));

        $(element).attr("popexist", 't');


        setTimeout(function(){
            $(".ppvr").remove();
            $(element).attr("popexist", 'f')
        }, 3000);
        
    });
};
