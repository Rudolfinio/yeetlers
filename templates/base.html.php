<?php

use App\Model\pomieszczenie;
use App\Model\pracownik;
use App\Model\pracownik_pomieszczenie;

//require_once(__DIR__ . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "index.html.php");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/dist/style.min.css">
    <title><?= $title ?? 'Custom Framework' ?></title>

    <style>
    #pietra {
        margin-left: 130px;
        /* margin-top: 50px; */
        /* float:left; */
    }

    #shapes rect {
        fill: inherit;
        fill-opacity: inherit;
    }

    #shapes rect:hover {
        fill-opacity: 25%;  
    }

    #shapes {
        fill:#56EB8D;
        fill-opacity: 25%;
    }
    </style>


</head>
<body <?= isset($bodyClass) ? "class='$bodyClass'" : '' ?>>
<nav><?php require(__DIR__ . DIRECTORY_SEPARATOR . 'nav.html.php') ?></nav>

<script>
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
                    pomieszczenia.style.cssText = "        fill: #56EB8D; fill-opacity: 0%;";
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
                document.getElementById("shapes").style.cssText = "        fill: #56EB8D; fill-opacity: 0%;"
            }
            else
            {   
                var pomieszczenia = document.getElementById('shapes');
                if (pom_numer.length=2)
                {
                    document.getElementById("canvas1").style.cssText = `
                    width: 992px;
                    height: 317px;
                    background-image: url(plany/${budynek_nazwa}/${budynek_nazwa}-0.svg);
                    background-size: cover;
                `
                    pomieszczenia.innerHTML = plan[budynek_nazwa]["p0"][pom_numer];
                }
                else if(pom_numer.charAt(0)=="0")
                {
                    document.getElementById("canvas1").style.cssText = `
                    width: 992px;
                    height: 317px;
                    background-image: url(plany/${budynek_nazwa}/${budynek_nazwa}-3.svg);
                    background-size: cover;
                `
                    pomieszczenia.innerHTML = plan[budynek_nazwa]["p3"][pom_numer];
                }
                else
                {
                    document.getElementById("canvas1").style.cssText = `
                    width: 992px;
                    height: 317px;
                    background-image: url(plany/${budynek_nazwa}/${budynek_nazwa}-${pom_numer.charAt(0)}.svg);
                    background-size: cover;
                `
                    pomieszczenia.innerHTML = plan[budynek_nazwa]["p"+pom_numer.charAt(0)][pom_numer];

                }
                document.getElementById("shapes").style.cssText = "        fill: #56EB8D; fill-opacity: 25%;"
            }
            

            // var nr_pietra = budynek_nazwa.substr(budynek_nazwa.length -1);
            // console.log(nr_pietra);
        }

        console.log(window.location.pathname);
        //!PLAN
</script>

<main><?= $main ?? null ?>
    <p id="szukaj">
        <?php
        $msg="";
        if(isset($_POST['pracownik'])){
            $msg= $_POST['pracownik'];
            $msg=explode(" ",$msg);
            if(sizeof($msg)==2) {
                $msg[0] = strtolower($msg[0]);
                $msg[1] = strtolower($msg[1]);;
                $msg[0] = ucfirst($msg[0]);
                $msg[1] = ucfirst($msg[1]);;
                $post = pracownik::findname($msg[0], $msg[1]);
                if($post != null) {
                    $pomieszczenie = pracownik_pomieszczenie::findprac($post->getPracownikId());
                    if ($pomieszczenie != null) {
                        echo $post->getTytul(), " ", $post->getImie(), " ", $post->getNazwisko(), " ";
                        foreach ($pomieszczenie as $pom) {
                            echo $pom->getPomieszczenie_id(), " ";
                        }
                    }else{echo "brak pomieszczenia";}
                }else{echo "brak takiej osoby";}
                //echo ($pomieszczenie[0]->getPracownik_id());

            }
        }
        if(isset($_POST['pracownia'])){
            $msg= $_POST['pracownia'];
            $msg=explode("-",$msg);
            if(sizeof($msg)==2) {
                if(is_numeric($msg[1])) {
                    $msg[0] = strtolower($msg[0]);
                    $pracownia = \App\Model\pomieszczenie_budynek::find($msg[0],$msg[1]);
                    if($pracownia != null){
                        // $budynek_nazwa = $pracownia->getNazwa();
                        // $pok_numer = $pracownia->getNumer();
                        // echo $pracownia->getNazwa(),"-",$pracownia->getNumer();
                        // echo '<script type="text/javascript">pokaz_plan('.$pracownia->getNazwa().','.$pracownia->getNumer().');</script>';
                        echo "<script type='text/javascript'>pokaz_plan('{$pracownia->getNazwa()}','{$pracownia->getNumer()}');</script>";

                    }else{echo "Nie ma takiego pokoju we wskazanym budynku ";}

                }else{echo "Podano nieprawidło numer pokoju ";}
            }
        }

        ?>

        
        
    </p></main>
<footer>&copy;<?= date('Y') ?> Donde Framework</footer>




</body>



</html>

