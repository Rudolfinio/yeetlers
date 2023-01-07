<?php

use App\Model\pomieszczenie;
use App\Model\pracownik;
use App\Model\pracownik_pomieszczenie;

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
</head>
<body <?= isset($bodyClass) ? "class='$bodyClass'" : '' ?>>
<nav><?php require(__DIR__ . DIRECTORY_SEPARATOR . 'nav.html.php') ?></nav>
<<<<<<< HEAD
<main><?= $main ?? null ?></main>
<footer>&copy;<?= date('Y') ?> Custom Framework</footer>
=======
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
                    if($pracownia != null){echo $pracownia->getNazwa(),"-",$pracownia->getNumer();}else{echo "Nie ma takiego pokoju we wskazanym budynku ";}

                }else{echo "Podano nieprawidło numer pokoju ";}
            }
        }

        ?>

    </p></main>
<footer>&copy;<?= date('Y') ?> Donde Framework</footer>



>>>>>>> 1b14f2d20243d931c58a29639ef51cfec9402f13

</body>
</html>

