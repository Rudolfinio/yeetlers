<?php

/** @var \App\Service\Router $router */
$templating = new \App\Service\Templating();
use \App\Model\budynek;
$title = 'Main strona';
$bodyClass = 'index';



ob_start();
echo "siema";
echo "
<script>
    document.getElementById('search').style.visibility='hidden';

</script>
";

$main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';