

var menu = document.querySelectorAll("a");
for (var i=0; i<menu.length; i++){
    var div = document.createElement("div");
    var locate = (i != 2) ? menu[i].href : "file:///C:/TWO/Web/3/web_hobby.html";
    var count = (sessionStorage.getItem(menu[i].href) == null) ? 0 : sessionStorage.getItem(menu[i].href);
    div.innerText = locate.slice(21) + " - " + count;
    document.body.appendChild(div);
}

function getCookie(){
// for (var i=0; i<menu.length; i++){
// var div = document.createElement("div");
//     var locate = (i != 2) ? menu[i].href : "file:///C:/TWO/Web/3/web_hobby.html";
//     var count = (document.cookie .getItem(menu[i].href) == null) ? 0 : sessionStorage.getItem(menu[i].href);
//     div.innerText = locate.slice(21) + " cookie - " + count;
// div.innerText = document.cookie;

// document.cookie = "text=13";
// for (let i=0; i<)
    // var sweet = document.cookie;
    // var ind = 0;
    // var count=0;
    // console.log(count);
    // console.log("++");
    // console.log(document.cookie);
    // console.log("++");

// document.body.appendChild(div);
//     console.log(menu[i].href);
// }
// console.log(document.cookie);
    var menu = document.querySelectorAll("a");
    var countvisit;
    var doccookie = document.cookie + ";";
    for (let i=0; i<7; i++){
        var div = document.createElement("div");
        var locate = (i != 2) ? menu[i].href : "http://127.0.0.1:8080/web_hobby.html";
        if (!doccookie.includes(locate)){
            countvisit = 0;
            div.innerText = locate + " - " + countvisit;
            document.body.appendChild(div);
            continue;
        }
        var ind = doccookie.indexOf(locate);
        var si = Number(doccookie.indexOf(";", ind)) + Number(1);
        var cookies = doccookie.slice(ind, si);
        // console.log(cookies);

        ind = Number(cookies.indexOf("=")) + Number(1);
        si = Number(cookies.indexOf(";", ind));
        countvisit = cookies.slice(ind, si);
        
        div.innerText = locate + " - " + countvisit;
        document.body.appendChild(div);

    }
    // console.log(cookies);
}

window.onload = getCookie();

