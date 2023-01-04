<?php
/** @var $router \App\Service\Router */

?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
    <li><a href="<?= $router->generatePath('pomieszczenie-index') ?>">Pomieszczenie</a></li>
</ul>
<?php
