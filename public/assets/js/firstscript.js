

function updCarrs(inex, curImg){
    let ph;
    let direction = "100";
    //поиск элемента
    if (inex == 1){
        direction = "-140";
        ph = $(curImg.parentElement.nextElementSibling);
    } else {
        ph = $(curImg.parentElement.previousElementSibling);
    }

    //если элемент не найден (конец/начало альбома), то переходим в другой конец
    if (ph.length == 0){
        if (inex == 1){
            ph = $(".phtalb_d > .phtalb");
            console.log("arar");
        } else {
            ph = $(".phtalb_d > .phtalb:last");
            console.log(ph);
        }
    }
    
    //вывод фото и подпись
    $(" .openedPhoto > img").attr("src", $(ph[0].childNodes[1]).attr("src"));
    $(" .openedPhoto > .title_for_foto").text($(ph[0].childNodes[3]).text());
    $(" .openedPhoto > img").animate({marginLeft: "0"}, 0);

    //возвращение текущего фото
    return ph[0].childNodes[1];
    
};

function carrsPhp(){
    fotos = $(".phtalb > img");
    for (var i=0; i<fotos.length; i++){

        // открытие фото
        $(fotos[i]).click(function(e){
            let d = $("<div class='openedPhoto'></div>");
            let openimg = $("<img src=" + this.src + ">");
            d.append(openimg);
            d.append($("<div class='title_for_foto'>" + this.alt + "</div>"));
            
            //создание кнопок управления - < x >
            let crosssaap = $("<span>&#10006;</span>");
            let lsaap = $("<span>&#5130;</span>");
            let rsaap = $("<span>&#5125;</span>");
            let arrows = $("<div></div>");
            let photo = this;

            arrows.append(lsaap, crosssaap, rsaap);

            crosssaap.click(function(){
                d.remove();
            });
            
            lsaap.click(function(){
                photo = updCarrs(-1, photo);
            });
            
            rsaap.click(function(){
                photo = updCarrs(1, photo);
            });
            
            d.append(arrows);
            $("body").append(d);
        });

        popover(fotos[i], fotos[i].alt);
        
    }
};

carrs();
