<?php

use ARTFin\Application;
use ARTFin\Plugins\DbPlugin;
use ARTFin\Plugins\RoutePlugin;
use ARTFin\Plugins\ViewPlugin;
use ARTFin\ServiceContainer;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());

$app->get('/', function (RequestInterface $request) use($app){
    $view = $app->service('view.renderer');
    return $view->render('test.html.twig',['name' => 'Alvaro Rosa']);
});

//$app->get('/home/{name}', function (ServerRequestInterface $request){
//    $response = new Response();
//    $response->getBody()->write("Response com emiter do diactoros");
//    return $response;
//});
$app->get('/category-costs', function() use($app){
    $view = $app->service('view.renderer');
    $meuModel = new \ARTFin\Models\CategoryCost();
    $categories = $meuModel->all();
    return $view->render('category-costs/list.html.twig', [
        'categories' => $categories
    ]);

});

$app->start();
