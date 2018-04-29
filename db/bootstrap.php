<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 20/04/2018
 * Time: 16:43
 */

use ARTFin\Application;
use ARTFin\Plugins\AuthPlugin;
use ARTFin\Plugins\DbPlugin;
use ARTFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());
return $app;