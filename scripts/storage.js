

var menu = document.querySelectorAll("a");
for (var i=0; i<menu.length; i++){
    var div = document.createElement("div");
    var locate = (i != 2) ? menu[i].href : "file:///C:/TWO/Web/3/web_hobby.html";
    var count = (sessionStorage.getItem(menu[i].href) == null) ? 0 : sessionStorage.getItem(menu[i].href);
    div.innerText = locate.slice(21) + " - " + count;
    document.body.appendChild(div);
    // console.log(menu[i].href);
}

// for (var i=0; i<menu.length; i++){
    var div = document.createElement("div");
//     var locate = (i != 2) ? menu[i].href : "file:///C:/TWO/Web/3/web_hobby.html";
//     var count = (document.cookie .getItem(menu[i].href) == null) ? 0 : sessionStorage.getItem(menu[i].href);
//     div.innerText = locate.slice(21) + " cookie - " + count;
// div.innerText = document.cookie;
document.cookie = "text=13; max-age=300; path=/; domain=3";
console.log("++ " + document.cookie);
    document.body.appendChild(div);
//     console.log(menu[i].href);
// }

