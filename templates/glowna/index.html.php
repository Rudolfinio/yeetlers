<?php

/** @var \App\Service\Router $router */
use \App\Model\budynek;
$title = 'Main strona';
$bodyClass = 'index';


ob_start(); ?>

    <style> 

    #pietra {
        margin-left: 130px;
        /* margin-top: 50px; */
        /* float:left; */
    }

    rect {
        fill: #56EB8D;
        fill-opacity: 0%;
    }

    rect:hover {
        fill-opacity: 25%;  
    }

    /* #wi1-212:hover {
        fill-opacity: 25%; 

    } */

    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

    <div id="wi1div">
        <h2 id="wi1h2">WI Budynek 1</h2>
        <div id="wi1map" ></div>
    </div>
    <div id="wi2div">
        <h2 id="wi2h2">WI Budynek 2</h2>
        <div id="wi2map"></div>
    </div>

    <!-- plan -->
    <div id="nazwa_budynku"></div>

    <div id="pietra">
    </div>

    <svg id="canvas1"> 
      <g id="shapes">
        <!-- <rect id="wi1-212" x="18.6%" y="55.7%" width="3.6%" height="16%"/>
        <rect id="207" x="42%" y="50.5%" width="3.6%" height="21.1%"/>
        <rect id="120" x="25.2%" y="18%" width="3.1%" height="21.1%"/> -->
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
            papaj.setContent(`${budynekInfo[0]}<br>${budynekInfo[1]} ${budynekInfo[2]} <br> ${budynekInfo[3]}, ${budynekInfo[4]}<br>${budynekInfo[5]}<br><a id="${budynekInfo[0]}">Wyswietl plan</a>`);
            document.getElementById(budynekInfo[0]).addEventListener("click", function(){pokaz_plan(budynekInfo[0])});
        };

        //PLAN wi1-212
        function pokaz_plan(budynek_nazwa, pom_numer = "0"){
            // var p2 = `        <rect id="wi1-212" x="18.6%" y="55.7%" width="3.6%" height="16%"/>
            //             <rect id="wi1-207" x="42%" y="50.5%" width="3.6%" height="21.1%"/>
            //             `
            // var p1 = ` <rect id="wi1-120" x="25.2%" y="18%" width="3.1%" height="21.1%"/>
            //         `
            // var p0 = `<rect id="wi1-1" x="44.4%" y="65%" width="3.5%" height="6.3%"/>`
            // var p3 = `<rect id="wi1-012" x="28.4%" y="18.6%" width="3.5%" height="20.3%"/>`

            // var p_pom = [];
            // p_pom.push(p0,p1,p2,p3);

            let plan = {
                "wi1" : {
                    "p0": {
                        "1" : '<rect id="wi1-1" x="44.4%" y="65%" width="3.5%" height="6.3%"/>',
                        },
                    "p1": {
                        "120" : '<rect id="wi1-120" x="25.2%" y="18%" width="3.1%" height="21.1%"/>'
                        },
                    "p2": {
                        "212" : '<rect id="wi1-212" x="18.6%" y="55.7%" width="3.6%" height="16%"/>',
                        "207" : '<rect id="wi1-207" x="42%" y="50.5%" width="3.6%" height="21.1%"/>'
                        },
                    "p3": {
                        "012" : '<rect id="wi1-012" x="28.4%" y="18.6%" width="3.5%" height="20.3%"/>'
                    }
                }
            }

            nazwa_budynku = document.getElementById('nazwa_budynku');
            nazwa_budynku.innerHTML = "<h2>" + budynek_nazwa.toUpperCase() + "<h2>";
            nazwa_budynku.style.cssText = `
            width:100%;
                float:left;
                // margin-left: 300px;
                text-align:center;
            `
            var pietra = document.getElementById('pietra');
            pietra.innerText = "";
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
                // if(i!=0)
                // {
                // przycisk.style.cssText = "border-style:solid";
                // }
                if(i==0){
                    przycisk.style.cssText = "background-color: #1C4A8B";
                    // var pomieszczenia = document.getElementById('shapes');
                    // pomieszczenia.innerHTML = "";
                    // for(const value of Object.values(plan[budynek_nazwa]["p0"]))
                    // {
                    //     pomieszczenia.innerHTML += value;
                    // }
                }

                pietra.appendChild(przycisk);

            //     if(i!=3)
            //     {
            //         pietra.appendChild(przycisk);
            //     }
            //     else
            //     {
            //         pietra.insertBefore(przycisk, pietra.firstChild);
            //     }
            
            }
            
            // var children = pietra.children;
            var children = document.getElementsByClassName("przyciski_pietra");

            for (var j = 0;j<children.length;j++)
            {
                // console.log(children[j].innerHTML)
                children[j].addEventListener("click", function() {

                    for (var k = 0;k<children.length;k++)
                    {
                        children[k].style.cssText = "background-color: #006AFF";
                    }      
                    this.style.cssText = "background-color: #1C4A8B";
                    nr_pietra = this.id.substr(this.id.length -1)
                    var a = budynek_nazwa +"-" + nr_pietra;
                    document.getElementById("canvas1").style.cssText = `
                        width: 992px;
                        height: 317px;
                        background-image: url(plany/${budynek_nazwa}/${a}.svg);
                        background-size: cover;
                    `   

                    var pomieszczenia = document.getElementById('shapes');
                    pomieszczenia.innerHTML = "";
                    //pomieszczenia.innerHTML = p_pom[this.id.substr(this.id.length-1)];
                    for(const value of Object.values(plan[budynek_nazwa]["p"+nr_pietra]))
                    {
                        pomieszczenia.innerHTML += value;
                    }


                    
                    // var pomieszczenia = document.getElementById("shapes").children;
                    // // var style = document.getElementsByTagName("style");
                    // var style = document.createElement("style");
                    // var css;
                    // for (var w=0; w<pomieszczenia.length;w++)
                    // {
                    //     //nr_pom = w.id.substr(w.id )
                    //     if(pomieszczenia[w].id.charAt(4) == nr_pietra)
                    //     {
                    //          css = "#" + pomieszczenia[w].id + ":hover {fill-opacity: 25%;}";
                    //          style.appendChild(document.createTextNode(css));
                    //         // style.styleSheet.cssText = css;
                    //     }
                    // }
                    // document.getElementsByTagName('head')[0].appendChild(style);
                })
                

            }
            if(pom_numer==0)
            {
                var pomieszczenia = document.getElementById('shapes');
                        pomieszczenia.innerHTML = "";
                        for(const value of Object.values(plan[budynek_nazwa]["p0"]))
                        {
                            pomieszczenia.innerHTML += value;
                        }
                document.getElementById("canvas1").style.cssText = `
                    width: 992px;
                    height: 317px;
                    background-image: url(plany/${budynek_nazwa}/${budynek_nazwa}-0.svg);
                    background-size: cover;
                `
            }
            else
            {   
                var pomieszczenia = document.getElementById('shapes');
                if (pom_numer.length=2)
                {
                    pomieszczenia.innerHTML = plan[budynek_nazwa]["p0"][pom_numer];
                }
                else if(pom_numer.charAt(0)=="0")
                {
                    pomieszczenia.innerHTML = plan[budynek_nazwa]["p3"][pom_numer];
                }
                else
                {
                    pomieszczenia.innerHTML = plan[budynek_nazwa]["p"+pom_numer.charAt(0)][pom_numer];

                }
                document.getElementsByTagName("g").style.cssText = "        fill: #56EB8D; fill-opacity: 0%;"
            }
            

            // var nr_pietra = budynek_nazwa.substr(budynek_nazwa.length -1);
            // console.log(nr_pietra);
        }

        console.log(window.location.pathname);
        //!PLAN
    </script>
    
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';