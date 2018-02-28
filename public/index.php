<?php

use ARTFin\Application;
use ARTFin\Plugins\RoutePlugin;
use ARTFin\ServiceContainer;
use Psr\Http\Message\ResponseInterface;
use ARTFin\Plugins\ViewPlugin;


require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->get('/', function(ResponseInterface $request) {
    var_dump($request->getUri());die();
    echo "Fodaaaa.";
});

//$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
  //  $response = new \Zend\Diactoros\Response();
    //$response->getBody()->write("response com emmiter do diactoros");
    //return $response;
$app->get('/category-costs', function() use($app){
    $view = $app->service('view.renderer');
    return $view->render('category-costs/list.html.twig');
});

$app->start();
?>


