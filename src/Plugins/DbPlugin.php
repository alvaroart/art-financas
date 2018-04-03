<?php

declare(strict_types=1);
namespace ARTFin\Plugins;


use ARTFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as capsule;

class DbPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        //function __construct()
        //{
            //$capsule = new Capsule;
            //$capsule->addConnection([
            //    'driver' => 'mysql',
            //    'host' => 'localhost',
            //    'database' => 'art_financas',
            //    'username' => 'root',
            //    'password' => 'senhasenha',
            //    'charset' => 'utf8',
            //    'collation' => 'utf8_unicode_ci'
           // ]);


            $capsule = new Capsule();
            $config = include __DIR__ . '/../../config/db.php';
            $capsule->addConection($config['development2']);
            $capsule->bootEloquent();

        }
    }
