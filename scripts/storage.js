
var pages = ["Главная", "Обо мне", "Мои интересы", "Фото", "Контакты", "Тест", "История"];

// вывод 
let menu = document.querySelectorAll("a");
let seshDiv = document.createElement("div");
let histDiv = document.createElement("div");
let metrDiv = document.createElement("div");

histDiv.innerText = "История текущего сеанса";
seshDiv.appendChild(histDiv);
seshDiv.classList.add("showMetrics");
metrDiv.classList.add("metrics");

for (let i=0; i<menu.length; i++){
    let pageDiv = document.createElement("div");
    let countDiv = document.createElement("div");

    countDiv.innerText = (sessionStorage.getItem(menu[i].href) == null) ? 0 : sessionStorage.getItem(menu[i].href);
    pageDiv.innerText = pages[i];

    metrDiv.appendChild(pageDiv);
    metrDiv.appendChild(countDiv);
}
seshDiv.appendChild(metrDiv);
document.body.appendChild(seshDiv);



function getCookie(){
    
    let menu = document.querySelectorAll("a");
    let cookDiv = document.createElement("div");
    let histDiv = document.createElement("div");
    let metrDiv = document.createElement("div");

    histDiv.innerText = "История за все время";
    cookDiv.appendChild(histDiv);
    cookDiv.classList.add("showMetrics");
    metrDiv.classList.add("metrics");

    let countvisit;
    let doccookie = document.cookie + ";";


    for (let i=0; i<7; i++){

        let locate = (i != 2) ? menu[i].href : "http://127.0.0.1:8080/web_hobby.html";

        if (!doccookie.includes(locate)){
            countvisit = 0;
        }
        else{
            let ind = doccookie.indexOf(locate);
            let si = Number(doccookie.indexOf(";", ind)) + Number(1);
            let cookies = doccookie.slice(ind, si);

            ind = Number(cookies.indexOf("=")) + Number(1);
            si = Number(cookies.indexOf(";", ind));
            countvisit = cookies.slice(ind, si);
            
        }

        var pageDivC = document.createElement("div");
        var countDivC = document.createElement("div");

        pageDivC.innerText = pages[i];
        countDivC.innerText = countvisit;

        metrDiv.appendChild(pageDivC);
        metrDiv.appendChild(countDivC);

    }
    cookDiv.appendChild(metrDiv);
    document.body.appendChild(cookDiv);
}

window.onload = getCookie();

