// массив месяцев
months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

// переменные
var div, div_h, div_d, flag_cal = false, first=true, current_year=2022, current_month=1, current_day=31, table_days;
var inp = document.getElementById("birthID");

// слушатель. при фокусировке открытие календаря
document.getElementById("birthID").addEventListener("focus", function(){
    if (!flag_cal) flag_cal = true;
    else return;

    inp.value = "01.01.2022";

    div = document.createElement("div");
    div.classList.add("main-div-cal");
    div_h = document.createElement("div");
    div_h.classList.add("head-div-cal");


    div_h.appendChild(addSelectYear());
    div_h.appendChild(addSelectMonth());
    div_h.appendChild(addCross());
    div.appendChild(div_h);
    div.appendChild(addWeek());
    printDays();
    document.getElementById("forcal").appendChild(div);
});


// добавлени крестика
function addCross(){
    var cross = document.createElement("div");
    cross.innerHTML = "&times";
    cross.classList.add("cross-cal");
    cross.addEventListener("click", function(){
        flag_cal = false;
        first = true;
        div.remove();
    });
    return cross;
}

// дни недели
var days_of_week = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];

// добавление названий дней
function addWeek(){
    var div_w = document.createElement("div");
    div_w.classList.add("week-div-cal");
    for (var i=0; i<7; i++){
        var span = document.createElement("div");
        span.innerText = days_of_week[i];
        div_w.appendChild(span);
    }
    return div_w;
}

// функция возвращает кол-во дней в текущем месяце
function getDaysCount(mon){
    if (mon == 1) return 28;
    if (mon < 7){
        if (mon % 2 == 1) return 30;
        if (mon % 2 == 0) return 31;
    }
    if (mon % 2 == 0) return 30;
    if (mon % 2 == 1) return 31;
    return "null-";
}

// создание выбора месяца. добавление слушателя для изменения
function addSelectMonth(){
    var selMonth = document.createElement("select");
    for (var i=0; i<12; i++){
        var opt = document.createElement("option");
        opt.innerText = months[i];
        opt.value = i;
        selMonth.appendChild(opt);
    };
    selMonth.addEventListener("change", function(){
        current_month = selMonth.value;
        current_day = getDaysCount(selMonth.value);
        console.log("month = " + current_month);
        console.log("day = " + current_day);
        setMonth();
        printDays();
    });
    return selMonth;
}

// создание выбора года. добавление слушателя для изменения
function addSelectYear(){
    var selYear = document.createElement("select");
    for (var i=2022; i>1900; i--){
        var opt = document.createElement("option");
        opt.innerText = i;
        opt.value = i;
        selYear.appendChild(opt);
    };
    selYear.addEventListener("change", function(){
        current_year = selYear.value;
        inp.value = inp.value.substring(0, 6) + current_year;
        printDays();
    });
    return selYear;
}

// вывод дней в месяце
function printDays(){
    if (!first) div_d.remove();
    first = false;
    div_d = document.createElement("div");
    div_d.classList.add("days-div-cal");
    div.appendChild(div_d);
    var dat = new Date(current_year, current_month, 1);
    for (var i=0; i<dat.getDay()-1; i++){
        var void_div = document.createElement("div");
        void_div.classList.add("days-div-cal-void");
        div_d.appendChild(void_div);
    }
    for (var i=1; i<current_day+1; i++){
        var divDay = document.createElement("div");
        divDay.innerHTML = i;
        divDay.value = i;
        divDay.classList.add("days-div-cal-num");
        // установка выбранного числа в строку с датой
        divDay.addEventListener("click", function(){
            setDay(this.innerHTML);
        });
        // divDay.onclick = setDay(this.value);
        div_d.appendChild(divDay);
    }
}

// установка выбранного месяца в строку с датой
function setMonth(){
    var monthInp = Number(current_month) + Number(1);
    if (monthInp < 10) monthInp = "0" + Number(monthInp);
    inp.value = inp.value.substring(0, 3) + monthInp + inp.value.substring(5);
}

// установак выбранного года в строку с датой
function setDay(nday){
    var dayInp = Number(nday);
    if (dayInp < 10) dayInp = "0" + Number(dayInp);
    inp.value = dayInp + inp.value.substring(2);
}

