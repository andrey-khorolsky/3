function carrs(){

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

        
    var all = $("<div></div>");
        for (var i=0; i<fotos.length; i++){
            var s = $("<div class='phtalb'></div>");
            var img = $("<img src=" + fotos[i] + ">");
            var h = $("<h5>" + titles[i] +"</h5>");

            // открытие фото
            img.click(function(e){
                console.log("open");
                var d = $("<div class='openedPhoto'></div>");
                d.click(function(){
                    this.remove();
                });
                var im = $("<img src=" + this.src + ">");
                d.append(im);
                $("body").append(d);
            });
            s.append(img);
            s.append(h);
            all.append(s);
        }
    all.addClass('phtalb_d');
    $("body").append(all);
};

window.onload = carrs();
