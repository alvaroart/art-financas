<?php

use ARTFin\Application;
use ARTFin\Plugins\DbPlugin;
use ARTFin\Plugins\RoutePlugin;
use ARTFin\ServiceContainer;
use Psr\Http\Message\ResponseInterface;
use ARTFin\Plugins\ViewPlugin;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());


$app->get('/category-costs', function() use($app){
    $view = $app->service('view.renderer');
    return $view->renderer('../templates/category-costs/list.html.twig');
});

$app->start();
//?>


