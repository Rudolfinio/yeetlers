<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case 'pomieszczenie-index':
    case null:
        $controller = new \App\Controller\pomieszczenieController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'pomieszczenie-create':
        $controller = new \App\Controller\pomieszczenieController();
        $view = $controller->createAction($_REQUEST['pomieszczenie'] ?? null, $templating, $router);
        break;
    case 'pomieszczenie-edit':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\pomieszczenieController();
        $view = $controller->editAction($_REQUEST['id'], $_REQUEST['pomieszczenie'] ?? null, $templating, $router);
        break;
    case 'pomieszczenie-show':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\pomieszczenieController();
        $view = $controller->showAction($_REQUEST['id'], $templating, $router);
        break;
    case 'pomieszczenie-delete':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\pomieszczenieController();
        $view = $controller->deleteAction($_REQUEST['id'], $router);
        break;
    default:
        $view = 'Not found';
        break;
}

if ($view) {
    echo $view;
}
