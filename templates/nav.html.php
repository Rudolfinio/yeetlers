<?php
/** @var $router \App\Service\Router */
/** @var $pracownik ?\App\Model\pracownik */
/** @var $pomieszczenie ?\App\Model\pomieszczenie */
?>
<div>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Mapa</a></li>



    <li><a href="<?= $router->generatePath('') ?>">Szukaj</a></li>



    <!-- <li id="liPanel"><a href="<?= $router->generatePath('') ?>">Panel administratora</a></li> -->



    <!-- <li id="liUser"><a href="<?= $router->generatePath('') ?>">Użytkownik |</a></li> -->



    <li id="liLogowanie"><a href="<?= $router->generatePath('') ?>">Logowanie</a></li>



    <!-- <li id="liWyloguj"><a href="<?= $router->generatePath('') ?>">Wyloguj</a></li> -->

</ul>
<div>

<div id="sear">
</div>
<script>

    function si(){

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



    }

</script>
<?php
