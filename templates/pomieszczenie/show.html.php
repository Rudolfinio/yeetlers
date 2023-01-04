<?php

/** @var \App\Model\pomieszczenie $pomieszczenie */
/** @var \App\Service\Router $router */

$title = "{$pomieszczenie->getNumer()} ({$pomieszczenie->getPomieszczenie_id()})";
$bodyClass = 'show';

ob_start(); ?>
    <h1><?= $pomieszczenie->getNumer() ?></h1>
    <article>
        <?= $pomieszczenie->getPietro_id();?>
    </article>

    <ul class="action-list">
        <li> <a href="<?= $router->generatePath('pomieszczenie-index') ?>">Back to list</a></li>
        <li><a href="<?= $router->generatePath('pomieszczenie-edit', ['id'=> $pomieszczenie->getPomieszczenie_id()]) ?>">Edit</a></li>
    </ul>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
