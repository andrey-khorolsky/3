
var fotos = [
    "img/nsx.jpg",
    "img/skyliner32.jpg",
    "img/s2k.jpg",
    "img/prelude.jpg",
    "img/skyline32.jpg",
    "img/por.jpg",
    "img/por911.jpg",
    "img/rx7.jpg",
    "img/miata.jpg",
    "img/miata2.jpg",
    "img/datsun.jpg",
    "img/fairl.jpg",
    "img/180sx.jpg",
    "img/180sx2.jpg",
    "img/180sx3.jpg"
];

var titles = [
    "Honda NSX",
    "Nissan Skyline GT-R R32",
    "Honda S2000",
    "Honda Prelude",
    "Nissan Skyline GT-R R32",
    "Porsche 911",
    "Porsche 911 RAUH-Welt Begriff",
    "Mazda RX-7 FD RocketBunny",
    "Mazda Mx-5 Miata",
    "Mazda Mx-5 Miata",
    "Datsun 620",
    "Nissan 240Z Fairlady",
    "Nissan 180SX",
    "Nissan 180SX",
    "Nissan 180SX"
];

function carrs(){ 
    
    var all = $("<div></div>");
        for (var i=0; i<fotos.length; i++){
            var s = $("<div class='phtalb'></div>");
            var img = $("<img src=" + fotos[i] + " alt='" + titles[i] + "'>");
            var h = $("<h5>" + titles[i] +"</h5>");

            // открытие фото
            img.click(function(e){
                var d = $("<div class='openedPhoto'></div>");
                let openimg = $("<img src=" + this.src + ">");
                d.append(openimg);
                d.append($("<div class='title_for_foto'>" + this.alt + "</div>"));
                
                let crosssaap = $("<span>&#10006;</span>");
                let lsaap = $("<span>&#5130;</span>");
                let rsaap = $("<span>&#5125;</span>");
                let arrows = $("<div></div>");

                arrows.append(lsaap, crosssaap, rsaap);

                crosssaap.click(function(){
                    d.remove();
                });
                
                lsaap.click(function(){
                    updCarrs(-1);
                });
                
                rsaap.click(function(){
                    updCarrs(1);
                });
                
                d.append(arrows);
                $("body").append(d);
            });

            popover(img, titles[i]);
            
            s.append(img);
            s.append(h);
            all.append(s);
        }
    all.addClass('phtalb_d');
    $("body").append(all);
};

function updCarrs(inex){
    let direction = "100";
    if (inex == 1) direction = "-140";

    $(" .openedPhoto > img").animate({marginLeft: direction+"%"}, 300, function(){$(" .openedPhoto > img").attr("src", fotos[curI+inex])});

    let neme = String($(" .openedPhoto > img").attr("src"));
    let curI = Number(fotos.indexOf(neme.substring(neme.indexOf("img/"))));

    if (curI+inex == fotos.length) curI = -1;
    if (curI+inex == -1) curI = fotos.length;
    
    $(" .openedPhoto > img").animate({marginLeft: "0"}, 0);
    $(" .openedPhoto > .title_for_foto").text(titles[curI+inex]);
    
}

window.onload = carrs();
