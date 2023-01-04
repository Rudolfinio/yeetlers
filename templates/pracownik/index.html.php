<?php

/** @var \App\Model\pracownik[] $posts */
/** @var \App\Service\Router $router */

$title = 'Pracownik List';
$bodyClass = 'index';

ob_start(); ?>
    <h1>Posts List</h1>

    <a href="<?= $router->generatePath('pracownik-create') ?>">Create new</a>

    <ul class="index-list">
        <?php foreach ($posts as $post): ?>
            <li><h3><?= $post->getTytul()  ?> <?= $post->getImie()  ?> <?= $post->getNazwisko()  ?></h3>
                <ul class="action-list">
                    <li><a href="<?= $router->generatePath('pracownik-show', ['id' => $post->getPracownikId()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('pracownik-edit', ['id' => $post->getPracownikId()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
