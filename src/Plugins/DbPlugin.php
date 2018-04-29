<?php
declare(strict_types=1);

namespace ARTFin\Plugins;


use ARTFin\Models\CategoryCost;
use ARTFin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as capsule;
use ARTFin\Repository\RepositoryFactory;
use Interop\Container\ContainerInterface;
use ARTFin\Models\User;

class DbPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['default_connection']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());
        $container->addLazy('category-cost.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(CategoryCost::class);
        });
        $container->addLazy('user.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(User::class);

        });
    }
}