<?php

use ARTFin\Application;
use ARTFin\Plugins\AuthPlugin;
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
$app->plugin(new AuthPlugin());



require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';

$app->start();