<?php

/** @var \App\Service\Router $router */
use \App\Model\budynek;
$title = 'Main strona';
$bodyClass = 'index';


ob_start(); ?>

    <style>
    #wi1map{
        height: 200px;
        width: 300px;
    }

    #wi2map{
        height: 200px;
        width: 300px;
    }

    #wi1div{
        float: left;
        margin-left: 30px;
    }

    #wi2div{
        float: left;
        margin-left: 30px;
    }

    #pietra {
        margin-left: 200px;
        margin-top: 50px;
        float:left;
    }

    rect {
        fill: #56EB8D;
        fill-opacity: 0%;
    }

    rect:hover {
        fill-opacity: 25%;  
    }

    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

    <div id="wi1div">
        <h2 id="wi1h2">WI Budynek 1</h2>
        <div id="wi1map"></div>
    </div>
    <div id="wi2div">
        <h2 id="wi2h2">WI Budynek 2</h2>
        <div id="wi2map"></div>
    </div>

    <!-- plan -->
    <div id="pietra">
    </div>

    <svg id="canvas1"> 
      <g id="shapes">
        <rect id="212" x="18.6%" y="55.7%" width="3.6%" height="16%"/>
        <rect id="207" x="42%" y="50.5%" width="3.6%" height="21.1%"/>
        <rect id="120" x="25.2%" y="18%" width="3.1%" height="21.1%"/>
      </g>    
    </svg>
    <!--  -->

    <script type="text/javascript">
        let map = L.map('wi1map').setView([53.44706061241225, 14.492245523376845], 18);
        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);
        //L.tileLayer.provider('Esri.WorldImagery').addTo(map);
        let marker = L.marker([53.44706061241225, 14.492245523376845]).addTo(map);
        marker.id = 1;
        marker.bindPopup("XD");
        marker.on('click', wiInfo);
        //map.panTo(new L.LatLng(53.44706061241225, 14.492245523376845))

        let map2 = L.map('wi2map').setView([53.448657649337356, 14.491028900707644], 18);
        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map2);
        //L.tileLayer.provider('Esri.WorldImagery').addTo(map);
        let marker2 = L.marker([53.448657649337356, 14.491028900707644]).addTo(map2);
        marker2.id = 2;
        marker2.bindPopup("XD");
        marker2.on('click', wiInfo);

        function wiInfo(e){
            //console.log("xd");
            let papaj = e.target.getPopup();
            let marekId = e.target.id;
            //document.cookie = "marekId = " + marekId;
            switch (marekId){
                case 1:
                    var contentuad = '<?php 
                    $marekId = 1;
                    $view = budynek::find($marekId);
                    echo json_encode([$view->getNazwa(), $view->getUlica(), $view->getNrBudynku(), $view->getKodPocztowy(), $view->getMiasto(), $view->getKraj()]);
                    ?>';
                    break;
                case 2:
                    var contentuad = '<?php 
                    $marekId = 2;
                    $view = budynek::find($marekId);
                    echo json_encode([$view->getNazwa(), $view->getUlica(), $view->getNrBudynku(), $view->getKodPocztowy(), $view->getMiasto(), $view->getKraj()]);
                    ?>';
                    break;
            }

            console.log(marekId)
            //tu poBIERAMY ZM,IENNEE Z BAZYL DANYCH
            //TO ONE IDOM DO ZMIENNYCH
            //JAK PUJDOM DO ZMIENNYCH TO IDOM DO STE CONTEINTE
           

            //document.cookies.remove({name: "marekId"});
            console.log(contentuad);
            let budynekInfo = JSON.parse(contentuad);
            papaj.setContent(`${budynekInfo[0]}<br>${budynekInfo[1]} ${budynekInfo[2]} <br> ${budynekInfo[3]}, ${budynekInfo[4]}<br>${budynekInfo[5]}<br><a id="aWi1Plan">Wyswietl plan</a>`);
            
        };

        //PLAN
        function pokaz_plan(){
            var pietra = document.getElementById('pietra');
            for(var i = 0; i<4; i++)
            {
                var przycisk = document.createElement("button");
                if (i==3)
                {
                    przycisk.innerHTML = "Pietro -1";
                }
                else
                {
                    var a =  "Pietro " + i
                    przycisk.innerHTML = a;    
                }
                var b = "p" + i;
                przycisk.id = b;
                przycisk.className = "przyciski_pietra";
                if(i!=0)
                {
                przycisk.style.cssText = "border-style:solid";
                }
                else{
                    przycisk.style.cssText = "border-style:inset";
                }
                pietra.appendChild(przycisk);
            }
            
            // var children = pietra.children;
            var children = document.getElementsByClassName("przyciski_pietra");
            for (var j = 0;j<children.length;j++)
            {
                // console.log(children[j].innerHTML)
                children[j].addEventListener("click", function() {
                    for (var k = 0;k<children.length;k++)
                    {
                        children[k].style.cssText = "border-style:solid";
                    }      
                    this.style.cssText = "border-style:inset";
                    var a = "wi1-" + this.id.substr(this.id.length -1);
                    document.getElementById("canvas1").style.cssText = `
                    width: 992px;
                    height: 317px;
                    background-image: url(plany/wi1/${a}.svg);
                    background-size: cover;
                `   
                })
                

            }
            document.getElementById("canvas1").style.cssText = `
                width: 992px;
                height: 317px;
                background-image: url(plany/wi1/wi1-0.svg);
                background-size: cover;
            `
        }
        pokaz_plan();
        console.log(window.location.pathname);
        //!PLAN
    </script>
    
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';