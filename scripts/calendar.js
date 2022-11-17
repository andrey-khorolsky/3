months = ["Январь", "Феврель", "Март", "Апрель", "Май", "Июнь", "Илюь", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

var div, div_h, div_d, flag = false, first=true, current_year, current_month, current_day=31, table_days;
var inp = document.getElementById("birthID");

document.getElementById("birthID").addEventListener("focus", function(){
    console.log("bf");
    if (!flag) flag = true;
    else return;

    inp.value = "00.01.2022";

    div = document.createElement("div");
    div.classList.add("main-div-cal");
    div_h = document.createElement("div");
    div_h.classList.add("head-div-cal");


    div_h.appendChild(addSelectYear());
    div_h.appendChild(addSelectMonth());
    div_h.appendChild(addCross());
    div.appendChild(div_h);
    printDays();
    document.getElementById("forcal").appendChild(div);
});


function addCross(){
    var cross = document.createElement("div");
    cross.innerHTML = "&times";
    cross.classList.add("cross-cal");
    cross.addEventListener("click", function(){
        flag = false;
        first = true;
        console.log("bb");
        div.remove();
    });
    return cross;
}

function getDaysCount(mon){
    if (mon == 2) return 28;
    if (mon % 2 == 0) return 30;
    if (mon % 2 == 1) return 31;
    return "null-";
}

function addSelectMonth(){
    var selMonth = document.createElement("select");
    for (var i=0; i<12; i++){
        var opt = document.createElement("option");
        opt.innerText = months[i];
        opt.value = i+1;
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
        console.log("year = " + current_year);
        inp.value = inp.value.substring(0, 6) + current_year;
        printDays();
    });
    return selYear;
}

function printDays(){
    var place = document.getElementsByClassName("days-div-cal");
    console.log(place);
    if (!first) div_d.remove();
    first = false;
    div_d = document.createElement("div");
    div_d.classList.add("days-div-cal");
    div.appendChild(div_d);

    for (var i=1; i<current_day+1; i++){
        var button = document.createElement("button");
        button.innerHTML = i;
        button.value = i;
        div_d.appendChild(button);
    }
}

function setMonth(){
    var monthInp = current_month;
    if (monthInp < 10) monthInp = "0" + Number(monthInp);
    inp.value = inp.value.substring(0, 3) + monthInp + inp.value.substring(5);
}

