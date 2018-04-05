<?php

declare(strict_types=1);
namespace ARTFin\Plugins;


use ARTFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as capsule;

class DbPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['default_connection']);
        $capsule->bootEloquent();
    }
}