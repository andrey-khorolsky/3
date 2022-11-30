// массив месяцев
months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

// дни недели
var days_of_week = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];

// переменные
var div, div_h, div_d, div_w, flag_cal = false, first=true, current_year=2022, current_month=1, current_day=31, table_days;
var inp = document.getElementById("birthID");

// слушатель. при фокусировке открытие календаря
$("#birthID").focus(function(){
    if (!flag_cal) flag_cal = true;
    else return;

    inp.value = "01.01.2022";

    div = $("<div></div>", {"class" : "main-div-cal"});
    div_h = $("<div></div>", {"class" : "head-div-cal"});


    div_h.append(addSelectYear());
    div_h.append(addSelectMonth());
    div_h.append(addCross());
    div.append(div_h);
    div.append(addWeek());
    printDays();
    $("#forcal").append(div);
});


// добавлени крестика
function addCross(){
    var cross = $('<div class="cross-cal">&times</div>');
    cross.click(function(){
        flag_cal = false;
        first = true;
        $(div).remove();
    });
    return cross;
}

// добавление названий дней
function addWeek(){
    div_w = $("<div></div>", {"class" : "week-div-cal"});
    for (let i=0; i<7; i++){
        var span = $("<div>" + days_of_week[i] + "</div>");
        div_w.append(span);
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
    var selMonth = $("<select></select>");
    for (let i=0; i<12; i++){
        var opt = $("<option></option>");
        opt.text(months[i]);
        opt.val(i);
        selMonth.append(opt);
    };
    selMonth.change(function(){
        current_month = $(selMonth).val();
        current_day = getDaysCount($(selMonth).val());
        setMonth();
        printDays();
    });
    return selMonth;
}

// создание выбора года. добавление слушателя для изменения
function addSelectYear(){
    var selYear = $("<select></select>");
    for (var i=2022; i>1900; i--){
        var opt = $("<option></option>");
        opt.text(i);
        opt.val(i);
        selYear.append(opt);
    };
    selYear.change(function(){
        current_year = $(selYear).val();
        inp.value = inp.value.substring(0, 6) + current_year;
        printDays();
    });
    return selYear;
}

// вывод дней в месяце
function printDays(){
    if (!first) div_d.remove();
    first = false;
    div_d =  $("<div></div>", {"class" : "days-div-cal"});
    div.append(div_d);
    var dat = new Date(current_year, current_month, 1);
    for (var i=0; i<dat.getDay()-1; i++){
        var void_div = $("<div></div>", {"class" : "days-div-cal-void"});
        div_d.append(void_div);
    }
    for (var i=1; i<current_day+1; i++){
        var divDay = $("<div></div>", {"class" : "days-div-cal-num"});
        divDay.val(i);
        divDay.text(i);
        // установка выбранного числа в строку с датой
        divDay.click(function(){
            setDay($(this).text());
        });
        div_d.append(divDay);
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

