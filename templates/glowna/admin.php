<?php

/** @var \App\Service\Router $router */
$templating = new \App\Service\Templating();
$title = 'Main strona';
$bodyClass = 'index';



ob_start();
session_start();


if(!isset($_SESSION['login']) || $_SESSION['login'] == ''){
    $path = $router->generatePath('');
    $router->redirect($path);
    
}
?>

<html>
    <h1>
        Panel Administratora
    </h1>
    <div class = "nawigacja">
        <ul>
            <li><a href="<?php $router->redirect($router->generatePath('pracownik-index'));  ?>">Pracownicy</a></li>

            <li><a >Pomieszczenia</a></li>

            <li><a>Pracownicy-Pomieszczenia</a></li>

            <li><a>Piętra</a></li>
        </ul>
    </div>
    <div class = "import">
        <li>Import pracowników z pliku CSV</li>
        <li><a href="<?php $router->generatePath("") ?>">Wybierz plik</a></li>
    </div>
</html>

<?php

$main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';