
// проверка на кол-во правильно заполненных полей
function openBut(){
    if (document.getElementsByClassName("fieldRight").length < 5)
        document.getElementById("sbb").disabled = true;
    else
        document.getElementById("sbb").removeAttribute("disabled");
}


// добавление ошибки возле поля, добавление класса ошибки к полю
function addErrorDiv(place, textError){
    let divErr = document.createElement("div");
    divErr.classList.add("contactsError");
    divErr.innerText = textError;
    place.parentElement.appendChild(divErr);
    place.classList.remove("fieldRight");
    place.classList.add("fieldError");
    openBut();
}


// добавление слушателя к полю ФИО
document.getElementById("fioID").addEventListener("blur", function(e){
    let re = /^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/;
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не заполнили ФИО");
        return;
    }

    if (!re.test(this.value)){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы неправильно заполнили ФИО");
        return;
    }

    if (flag) divErr.remove();
    this.classList.remove("fieldError");
    this.classList.add("fieldRight");
    openBut();
});


// добавление слушателя к полю дата рождения
document.getElementById("birthID").addEventListener("blur", function(e){
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не заполнили дату рождения");
        return;
    }

    if (flag) divErr.remove();
    this.classList.remove("fieldError");
    this.classList.add("fieldRight");
    openBut();
});


// добавление слушателя к полю возраст
document.getElementById("ageID").addEventListener("blur", function(e){
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не выбрали возраст");
        return;
    }

    if (flag) divErr.remove();
    this.classList.remove("fieldError");
    this.classList.add("fieldRight");
    openBut();
});


// добавление слушателя к полю email
document.getElementById("emailID").addEventListener("blur", function(e){
    let re = /^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/;
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не ввели почту");
        return;
    }

    if (!re.test(this.value)){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы неправильно заполнили почту");
        return;
    }

    if (flag) divErr.remove();
    this.classList.remove("fieldError");
    this.classList.add("fieldRight");
    openBut();
});


// добавление слушателя к полю номер телефона
document.getElementById("telID").addEventListener("blur", function(e){
    let re = /^\+[37][0-9]{9,11}$/;
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы не ввели номер телефона");
        return;
    }

    if (!re.test(this.value)){
        if (flag) divErr.remove();
        flag = false;
        addErrorDiv(this, "Вы неправильно ввели номер телефона");
        return;
    }

    if (flag) divErr.remove();
    this.classList.remove("fieldError");
    this.classList.add("fieldRight");
    openBut();
});
