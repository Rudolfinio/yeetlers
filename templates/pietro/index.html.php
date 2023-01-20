<?php

/** @var \App\Model\Pietro[] $Pietra */
/** @var \App\Service\Router $router */

$title = 'Pietro List';
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

    <h2>Pietra List</h2>

    <a href="<?= $router->generatePath('Pietro-create') ?>">Create new</a>

    <ul class="index-list">
        <?php foreach ($Pietra as $Pietro): ?>
            <li><h3><?= $Pietro->getBudynekId() ?></h3>
                <ul class="action-list">
                    <li><a href="<?= $router->generatePath('Pietro-show', ['id' => $Pietro->getPietroId()]) ?>">Details</a></li>
                    <li><a href="<?= $router->generatePath('Pietro-edit', ['id' => $Pietro->getPietroId()]) ?>">Edit</a></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
