function chFio(form){
    if (form.value == "") {
        form.focus();
        alert("Вы не заполнили ФИО");
        return false;
    }
    var re = /^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/;
    if (!re.test(form.value)){
        form.focus();
        alert("Вы не правильно заполнили ФИО");
        return false;     
    }
    return true;
}

function chselect(form){
    if (form.selectedIndex == 0) {
        form.focus();
        alert("Вы не выбрали элемент");
        return false;
    }
    return true;
}

function checktest(event){
    var fiof = document.getElementById("fioID");
    var groupf = document.getElementById("groupID");
    var hmf = document.getElementById("hmID");
    var lqf = document.getElementById("lqID");
    if (!chFio(fiof)) return false;
    if (!chselect(groupf)) return false;
    if (hmf.value == "") {
        hmf.focus();
        alert("Вы не ответили на вопрос");
        return false;
    }
    var res = 0;
    if (document.testform.q21.checked) res++;
    if (document.testform.q22.checked) res++;
    if (document.testform.q23.checked) res++;
    if (document.testform.q24.checked) res++;
    if (document.testform.q25.checked) res++;
    if (res < 2) {
        alert("Вы не выбрали варианты");
        return false;
    }
    if (!chselect(lqf)) return false;
}

function checkcont(event){
    var re = /^\+[37][0-9]{9,11}$/;
    var fiof = document.getElementById("fioID");
    var agef = document.getElementById("ageID");
    var emailf = document.getElementById("emailID");
    var telf = document.getElementById("telID");
    var men = document.contform.sex[0].checked;
    var women = document.contform.sex[1].checked;
    if (!chFio(fiof)) return false;
    if ((men==false) && (women == false)){
        alert("Вы не выбрали пол");
        return false;
    }
    if (!chselect(agef)) return false;
    if (emailf.value == "") {
        emailf.focus();
        alert("Вы не ввели почту");
        return false;
    }
    if (telf.value == ""){
        telf.focus();
        alert("Вы не ввели номер телефона");
        return false;
    }
    if (!re.test(telf.value)){
        telf.focus();
        alert("Вы не правильно ввели номер телефона");
        return false;
    }
    return true;
}