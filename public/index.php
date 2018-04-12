<?php

use ARTFin\Application;
use ARTFin\Plugins\DbPlugin;
use ARTFin\Plugins\RoutePlugin;
use ARTFin\Plugins\ViewPlugin;
use ARTFin\ServiceContainer;
use Psr\Http\Message\RequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());



require_once __DIR__ . '/../src/controllers/category-costs.php';

$app->start();