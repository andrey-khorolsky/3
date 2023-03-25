
// вывод даты и вемени
let days = ["воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота"];

function minute(m){
    if (m < 10) return "0" + m;
    return m;
}

function showtime(){
    // console.log("time");
    let nli = $("<li></li>");
    let na = $("<a></a>");
    nli.append(na);
    $('ul').append(nli);

    setInterval( function(){
    let date = new Date();
    na.html(date.getDate() + "." + Number(date.getMonth() + 1) + "." + date.getFullYear() + '<br>'
    + days[date.getDay()] + '<br>' + date.getHours() + ":" + minute(date.getMinutes()) + ":" + minute(date.getSeconds()));
    }, 1000);
}

// открытие меню "мои интересы"
var sctn = ["Музыка", "Книги", "Фильмы", "Игры"];
let flag = false;

function openMenu(){
    let u, na, l;

    if (!flag) flag = true;
    else{
        flag = false
        $('.ul_from_opened_menu').remove();
        return;
    }
    u = $("<ul></ul>", {'class' : 'ul_from_opened_menu'});
    l = $("<li></li>", {'width':'100%'});
    for (let i = 0; i<4; i++){
        console.log("h");
        na = $("<a></a>", {'href': 'http://web-my-site/hobby/#sctn' + Number(i+1)});
        na.mouseover(function(e){
            this.style.backgroundColor = "#CAA88A";
        });
        na.mouseout(function(e){
            this.style.backgroundColor = "#FFF8F1";
        });
        na.click(function(e){
            flag = false;
            $('.ul_from_opened_menu').remove();
        });
        na.html(sctn[i]);
        l.append(na);
    }
    u.append(l);
    $(".nav").append(u);
}

// изменение меню при наведении
async function glamMenu(){
    let menu = $("a");
    for (let i=0; i<7; i++){
        let leafs = menu[i].children;
        // console.log("a");
        leafs[0].src = "http://web-my-site/public/assets/img/bulb.png";
        let locate = (i != 2) ? menu[i].href : "/web_hobby.html";
        
        if (window.location.href.includes(locate)){
            leafs[0].src = "http://web-my-site/public/assets/img/color_bulb.png";
            continue;
        }

        $(menu[i]).mouseover(function(e){
            this.children[0].src ="http://web-my-site/public/assets/img/color_bulb.png";
        }).mouseout(function(e){
            this.children[0].src = "http://web-my-site/public/assets/img/bulb.png";
        });
    }
}

//сохранение истории текущего сенаса
function createSeshStorage(){
    let currentPage = window.location.href;
    currentPage = currentPage.slice(currentPage.lastIndexOf("web-my-site/"));
    currentPage = currentPage.slice(currentPage.indexOf("/"));
    currentPage = currentPage.slice(1, currentPage.length-1);

    let locate = (!currentPage.includes("hobby")) ? currentPage : "hobby";
    sessionStorage.setItem(locate, Number(sessionStorage.getItem(locate)) + Number(1));
}

//сохранение истории за неделю
function createCookie(){
    let currentPage = window.location.href;
    currentPage = currentPage.slice(currentPage.lastIndexOf("web-my-site/"));
    currentPage = currentPage.slice(currentPage.indexOf("/"));
    currentPage = currentPage.slice(1, currentPage.length-1);

    let locateCookie = (!currentPage.includes("hobby")) ? currentPage : "hobby";
   
    let cook = document.cookie + ";";
    if (!cook.includes(locateCookie)){
        document.cookie = locateCookie + "=1; max-age=604800; path=/; domain=web-my-site";
        return;
    }

    let ind = cook.indexOf(locateCookie);
    let si = Number(cook.indexOf(";", ind)) + Number(1);
    let cookies = cook.slice(ind, si);

    ind = Number(cookies.indexOf("=")) + Number(1);
    si = Number(cookies.indexOf(";", ind));
    cookies = cookies.slice(ind, si);

    cookies = Number(cookies) + Number(1);
    
    document.cookie = locateCookie + "=" + cookies + "; max-age=604800; path=/; domain=web-my-site";
};

//popover
function popover(element, textd){
    $(element).attr("inform", textd);
    $(element).attr("popexist", 'f');

    $(element).mouseover(function(){

        if ($(this).attr("popexist") == 't') return;

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
            $(pop).remove();
            $(element).attr("popexist", 'f')
        }, 3000);
        
    });
};
 

createSeshStorage();
createCookie();

$(document).ready(function(){
    glamMenu();
    showtime();
});

