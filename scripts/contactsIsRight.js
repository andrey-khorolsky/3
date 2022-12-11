
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


function modal_win(){
    let policy = $(".tstf:last");

    policy.click(function(){
        if ($(this).attr("policy") == "t") return;
        $(this).attr("policy", "t");
        
        let div_win = $("<div class='modal_window'></div>");
        // div_win.click(function(){
        //     this.remove();
        // });

        let div_mssg = $("<div>Продолжая пользоваться сайтом вы соглашаетесь с данными условиями. Всю полученную от вас информацию мы используем по своему усмотрению.</div>");
        
        let btn = $('<button>Понял</button>');
        btn.click(function(){
            div_win.remove();
            $(policy).attr("policy", "f");
        });

        let div_btn =  $("<div id='div_btn_policy'></div>");
        div_btn.append(btn);
        div_btn.append($("<button>Не согласен</button>"));

        div_mssg.append(div_btn);
        div_win.append(div_mssg);
        $('body').append(div_win);

    });
}

modal_win();
popover("#fioID", "Введите Фамилию, Имя и Отчество через пробел с заглавных букв");
popover("#birthID", "Выберите дату рождения помощью календаря");
popover("#ageID", "Выберите свой возрастной диапозон");
popover("#emailID", "Введите адрес электронной почты в формате abcde@fgh.jkl");
popover("#telID", "Введите номер телефона. Номер должен начинаться с +7 ил +3, количество цифр в номере - от 8 до 11");

