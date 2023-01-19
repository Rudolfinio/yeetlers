<?php

/** @var \App\Model\pracownik[] $posts */
/** @var \App\Service\Router $router */

$title = 'Pracownik List';
$bodyClass = 'index';

ob_start(); 
session_start();
?>
    <h1>
        Panel Administratora
    </h1>
    <div class = "nawigacja">
        <ul>
            
            <li><a href="<?= $router->generatePath('pracownik-index');?>">Pracownicy</a></li>

            <li><a href="<?= $router->generatePath('pomieszczenie-index');?>">Pomieszczenia</a></li>

            <li><a>Pracownicy-Pomieszczenia</a></li>

            <li><a href="<?= $router->generatePath('Pietro-index');?>">Piętra</a></li>
        </ul>
    </div>
    <div class = "import">
        <li>Import pracowników z pliku CSV</li>
        <li><a href="<?php $router->generatePath(""); ?>">Wybierz plik</a></li>
    </div>

    <h2>Pracownicy</h2>
    
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
