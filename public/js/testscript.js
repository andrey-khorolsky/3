
function chselect(form){
    if (form.val() == 0) {
        form.focus();
        alert("Вы не выбрали элемент");
        return false;
    }
    return true;
}

function checktest(event){
    let fiof = $("#fioID");
    let groupf = $("#groupID");
    let hmf = $("#hmID");
    let lqf = $("#lqID");
    
    if (fiof.val() == "") {
        fiof.focus();
        alert("Вы не заполнили ФИО");
        return false;
    }
    let re = /^[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+$/;
    if (!re.test(fiof.val())){
        fiof.focus();
        alert("Вы не правильно заполнили ФИО");
        return false;     
    }
    
    if (!chselect(groupf)) return false;
    if (hmf.val() == "") {
        hmf.focus();
        alert("Вы не ответили на вопрос");
        return false;
    }
    
    let res = 0;
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

