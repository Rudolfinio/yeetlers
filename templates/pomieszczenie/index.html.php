<?php

/** @var \App\Model\pomieszczenie[] $pomieszczenia */
/** @var \App\Service\Router $router */

$title = 'Pomieszczenie List';
$bodyClass = 'index';

ob_start(); ?>
    <h1>Pomieszczenia List</h1>

    <a href="<?= $router->generatePath('pomieszczenie-create') ?>">Create new</a>

    <ul class="index-list">
        <?php foreach ($pomieszczenia as $pomieszczenie): ?>
            <li><h3><?= $pomieszczenie->getNumer() ?></h3>
                <ul class="action-list">
                    <li><a href="<?= $router->generatePath('pomieszczenie-show', ['id' => $pomieszczenie->getPomieszczenie_id()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('pomieszczenie-edit', ['id' => $pomieszczenie->getPomieszczenie_id()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
