

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
                console.log("open");
                var d = $("<div class='openedPhoto'></div>");
                let openimg = $("<img src=" + this.src + ">");
                d.append(openimg);
                d.append($("<div>" + this.alt + "</div>"));
                
                
                let crosssaap = $("<span>&#10006;</span>");
                let lsaap = $("<span>&#5130;</span>");
                let rsaap = $("<span>&#5125;</span>");
                let arrows = $("<div></div>");

                arrows.append(lsaap, crosssaap, rsaap);

                crosssaap.click(function(){
                    console.log("exit");
                    d.remove();
                });
                
                lsaap.click(function(){
                    updCarrs(-1);
                    // console.log(titles.indexOf(openimg.alt));
                    openimg.src = fotos[Number(titles.indexOf(openimg.alt)) - Number(1)];
                });
                
                rsaap.click(function(){
                    updCarrs(1);
                });
                
                d.append(arrows);
                $("body").append(d);
            });
            s.append(img);
            s.append(h);
            all.append(s);
        }
    all.addClass('phtalb_d');
    $("body").append(all);
};

function updCarrs(inex){
    let neme = String($(" .openedPhoto > img").attr("src"));
    console.log(neme.substring(neme.indexOf("img/")));
    console.log(fotos.indexOf(neme.substring(neme.indexOf("img/"))));
    let curI = Number(fotos.indexOf(neme.substring(neme.indexOf("img/"))));
    if (curI+inex == fotos.length) curI = -1;
    if (curI+inex == -1) curI = fotos.length;

    $(" .openedPhoto > img").attr("src", fotos[curI+inex]);
}

window.onload = carrs();
