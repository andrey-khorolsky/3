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

        
    var all = document.createElement("div");
        for (var i=0; i<fotos.length; i++){
            var s = document.createElement("div");
            var img = document.createElement("img");
            var h = document.createElement("h5");
            var elemText = document.createTextNode(titles[i]);
            s.classList.add('phtalb');
            img.src = fotos[i];
            img.style.cursor = "pointer";
            //открытие фото
            img.addEventListener("click", function(e){
                var d = document.createElement("div");
                d.addEventListener("click", function(){
                    document.body.style.overflow = "visible";
                    this.remove();
                });
                var im = document.createElement("img");
                im.src = this.src;
                d.classList.add("openedPhoto");
                d.appendChild(im);
                document.body.style.overflow = "auto";
                document.body.appendChild(d);
        
            });
            h.appendChild(elemText);
            s.appendChild(img);
            s.appendChild(h);
            all.appendChild(s);
        }
    all.classList.add('phtalb_d');
    document.body.appendChild(all);
};

window.onload = carrs();
