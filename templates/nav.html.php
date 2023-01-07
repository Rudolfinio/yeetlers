<?php
/** @var $router \App\Service\Router */
/** @var $pracownik ?\App\Model\pracownik */
/** @var $pomieszczenie ?\App\Model\pomieszczenie */
<<<<<<< HEAD
?>

<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
    <li><button href="" id="search" onclick="si()">Szukaj</button></li>
    <li><a href="<?= $router->generatePath('budynek-index') ?>">Budynki</a></li>
=======

use App\Model\pracownik;

?>
<div>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Mapa</a></li>



    <li><a id="search" onclick="si()">Szukaj</a></li>
>>>>>>> 1b14f2d20243d931c58a29639ef51cfec9402f13



    <!-- <li id="liPanel"><a href="<?= $router->generatePath('') ?>">Panel administratora</a></li> -->



    <!-- <li id="liUser"><a href="<?= $router->generatePath('') ?>">Użytkownik |</a></li> -->



    <li id="liLogowanie"><a href="<?= $router->generatePath('') ?>">Logowanie</a></li>



    <!-- <li id="liWyloguj"><a href="<?= $router->generatePath('') ?>">Wyloguj</a></li> -->
</ul>
<<<<<<< HEAD
<div id="sear">
=======
</div>

<div id="sear" style="z-index: 2" >
>>>>>>> 1b14f2d20243d931c58a29639ef51cfec9402f13
</div>
<script>

    function si(){
<<<<<<< HEAD

        let d = document.getElementById("sear");
        let inn = document.createElement("div");
        let pracownik = document.createElement("a");
        pracownik.innerHTML="pracownik";

        let pracownia = document.createElement("a");
        pracownia.innerHTML="pracownia";
        pracownia.style.marginLeft="5px";
        pracownik.addEventListener("click",function (){
            inn.innerHTML="";
            let frm = document.createElement("form");
            frm.method="POST";
            frm.action="";
            let inp = document.createElement("input");
            inp.type="text";
            inp.name="pole";
            inp.placeholder="pracownik";
            let sbmt = document.createElement("input");
            sbmt.setAttribute("type", "submit");
            frm.appendChild(inp);
            frm.appendChild(sbmt);
            inn.appendChild(frm);

        })
        pracownia.addEventListener("click",function (){
            inn.innerHTML="";
            let frm = document.createElement("form");
            frm.method="POST";
            frm.action="";
            let inp = document.createElement("input");
            inp.type="text";
            inp.name="pole";
            inp.placeholder="pracownia";
            let sbmt = document.createElement("input");
            sbmt.setAttribute("type", "submit");
            frm.appendChild(inp);
            frm.appendChild(sbmt);
            inn.appendChild(frm);

        })
        d.appendChild(pracownik);
        d.appendChild(pracownia);
        d.appendChild(inn);



=======
        let d = document.getElementById("sear");
        if(d.innerHTML !=""){
            d.innerHTML="";
            d.style=null;
        }else {
            d.style.width="200px";
            d.style.height="75px";
            d.style.position="absolute";
            d.style.paddingLeft="5px";
            let inn = document.createElement("div");
            let pracownik = document.createElement("a");
            pracownik.innerHTML = "pracownik";
            pracownik.style.color="white";
            let pracownia = document.createElement("a");
            pracownia.innerHTML = "pracownia";
            pracownia.style.color="white";
            pracownia.style.marginLeft = "5px";
            pracownik.addEventListener("click", function () {
                inn.innerHTML = "";
                let frm = document.createElement("form");
                frm.action="";
                frm.method="POST";
                let inp = document.createElement("input");
                inp.type = "text";
                inp.name = "pracownik";
                inp.placeholder = "imie nazwisko";
                let sbmt = document.createElement("input");
                sbmt.setAttribute("type", "submit");
                sbmt.id="pracownik";
                frm.appendChild(inp);
                frm.appendChild(sbmt);
                inn.appendChild(frm);

            })
            pracownia.addEventListener("click", function () {
                inn.innerHTML = "";
                let frm = document.createElement("form");
                frm.action="";
                frm.method="POST";
                let inp = document.createElement("input");
                inp.type = "text";
                inp.name = "pracownia";
                inp.placeholder = "budynek-pokoj";
                let sbmt = document.createElement("input");
                sbmt.setAttribute("type", "submit");
                sbmt.id="pracownia";
                frm.appendChild(inp);
                frm.appendChild(sbmt);
                inn.appendChild(frm);

            })
            d.appendChild(pracownik);
            d.appendChild(pracownia);
            d.appendChild(inn);
        }
>>>>>>> 1b14f2d20243d931c58a29639ef51cfec9402f13
    }

</script>
<?php
