<?php
/** @var $router \App\Service\Router */
/** @var $pracownik ?\App\Model\pracownik */
/** @var $pomieszczenie ?\App\Model\pomieszczenie */

use App\Model\pracownik;

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
</div>

<div id="sear" >
</div>
<script>

    function si(){
        let d = document.getElementById("sear");
        if(d.innerHTML !=""){
            d.innerHTML="";
            d.style=null;
        }else {
            d.style.width="200px";
            d.style.height="75px";
            d.style.backgroundColor="yellow";
            d.style.position="absolute";
            d.style.paddingLeft="5px";
            let inn = document.createElement("div");
            let pracownik = document.createElement("a");
            pracownik.innerHTML = "pracownik";

            let pracownia = document.createElement("a");
            pracownia.innerHTML = "pracownia";
            pracownia.style.marginLeft = "5px";
            pracownik.addEventListener("click", function () {
                inn.innerHTML = "";
                let frm = document.createElement("form");
                frm.action="";
                frm.method="POST";
                let inp = document.createElement("input");
                inp.type = "text";
                inp.name = "pracownik";
                inp.placeholder = "pracownik";
                let sbmt = document.createElement("input");
                sbmt.setAttribute("type", "submit");
                sbmt.id="pracownik";
                //sbmt.addEventListener("click", function (){
                //    console.log("pracownik");
                //    let val = document.getElementById('inputpracownik').value;
                //    console.log(val);
                //    document.cookie = "name="+val;
                //  //$XD=  <?php
                //  //  if(isset($_COOKIE["name"])) {
                //  //      $somevar = $_COOKIE["name"];
                //  //      echo $somevar;
                //  //  }
                //  //  ?>
                //  //  console.log($XD);
                //})
                frm.appendChild(inp);
                frm.appendChild(sbmt);
                inn.appendChild(frm);

            })
            pracownia.addEventListener("click", function () {
                inn.innerHTML = "";
                let frm = document.createElement("div");
                let inp = document.createElement("input");
                inp.id="inputpracownia";
                inp.type = "text";
                inp.name = "pracownia";
                inp.placeholder = "pracownia";
                let sbmt = document.createElement("button");
                sbmt.textContent="submit"
                sbmt.id="pracownia";
                sbmt.addEventListener("click", function (){
                    console.log("pracownia");
                    let val = document.getElementById('inputpracownia').value;
                    console.log(val);
                })


                frm.appendChild(inp);
                frm.appendChild(sbmt);
                inn.appendChild(frm);

            })
            d.appendChild(pracownik);
            d.appendChild(pracownia);
            d.appendChild(inn);
        }
    }

</script>
<?php
