<?php
/** @var $router \App\Service\Router */

?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>



    <li><a href="<?= $router->generatePath('pracownik-index') ?>">Pracownicy</a></li>

</ul>
<?php
