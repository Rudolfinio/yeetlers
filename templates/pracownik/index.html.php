<?php

/** @var \App\Model\pracownik[] $posts */
/** @var \App\Service\Router $router */

$title = 'Pracownik List';
$bodyClass = 'index';

ob_start(); 
session_start();
?>
    <div class = "nawigacja">
        <h2>Panel Administratora</h2>
        <ul>
            
            <li><a href="<?= $router->generatePath('pracownik-index');?>" style="color: #006AFF">Pracownicy</a></li>

            <li><a href="<?= $router->generatePath('pomieszczenie-index');?>">Pomieszczenia</a></li>

            <li><a>Pracownicy-Pomieszczenia</a></li>

            <li><a href="<?= $router->generatePath('Pietro-index');?>">Piętra</a></li>
        </ul>
    </div>
    <div class = "import">
        <p>Import pracowników z pliku CSV</p>
        <a href="<?php $router->generatePath(""); ?>">Wybierz plik</a>
    </div>
    
    <a id="dodajPrac" href="<?= $router->generatePath('pracownik-create') ?>">Dodaj pracownika</a>

    <ul class="index-list">
        <?php foreach ($posts as $post): ?>
            <li><p><?= $post->getTytul()  ?> <?= $post->getImie()  ?> <?= $post->getNazwisko()  ?></p>
                <ul class="action-list">
                    <li><a href="<?= $router->generatePath('pracownik-show', ['id' => $post->getPracownikId()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('pracownik-edit', ['id' => $post->getPracownikId()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
