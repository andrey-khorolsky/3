var fieldsRight = [false, false, false, false, false];

var fields = [
    document.getElementById("fioID"),
    document.getElementById("birthID"),
    document.getElementById("ageID"),
    document.getElementById("emailID"),
    document.getElementById("telID"),
]
// console.log(fields);

function openBut(){
    for (let i=0; i<5; i++){
        if (!fieldsRight[i]){
            document.getElementById("sbb").disabled = true;
            return;
        }
    }
    document.getElementById("sbb").removeAttribute("disabled");
}



document.getElementById("fioID").addEventListener("blur", function(e){
    let re = /^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/;
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы не заполнили ФИО";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[0] = false;
        this.classList.add("fieldError");
        openBut();
        return;
    }

    if (!re.test(this.value)){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы неправильно заполнили ФИО";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[0] = false;
        openBut();
        return;
    }

    fieldsRight[0] = true;
    if (flag) divErr.remove();
    this.classList.remove("fieldError");
    openBut();
});


document.getElementById("birthID").addEventListener("blur", function(e){
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы не заполнили дату рождения";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[1] = false;
        openBut();
        return;
    }

    
    fieldsRight[1] = true;
    if (flag) divErr.remove();
    openBut();
});



document.getElementById("ageID").addEventListener("blur", function(e){
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы не выбрали возраст";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[2] = false;
        openBut();
        return;
    }

    fieldsRight[2] = true;
    if (flag) divErr.remove();
    openBut();
});


document.getElementById("emailID").addEventListener("blur", function(e){
    let re = /^[0-9a-zA-z][0-9a-zA-Z\.]*[0-9a-zA-z]?[^\.]\@[-a-zA-z]+\.[-a-zA-z]{2,}$/;
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы не ввели почту";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[3] = false;
        openBut();
        return;
    }

    if (!re.test(this.value)){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы неправильно заполнили почту";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[3] = false;
        openBut();
        return;
    }

    fieldsRight[3] = true;
    if (flag) divErr.remove();
    openBut();
});



document.getElementById("telID").addEventListener("blur", function(e){
    let re = /^\+[37][0-9]{9,11}$/;
    let divErr = this.parentElement.getElementsByClassName("contactsError")[0];
    let flag = (divErr) ? true : false;

    if (this.value == ""){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы не ввели номер телефона";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[3] = false;
        openBut();
        return;
    }

    if (!re.test(this.value)){
        if (flag) divErr.remove();
        flag = false;
        divErr = document.createElement("div");
        divErr.classList.add("contactsError");
        divErr.innerText = "Вы неправильно ввели номер телефона";
        if (!flag) this.parentElement.appendChild(divErr);
        fieldsRight[4] = false;
        openBut();
        return;
    }

    fieldsRight[4] = true;
    if (flag) divErr.remove();
    openBut();
});
