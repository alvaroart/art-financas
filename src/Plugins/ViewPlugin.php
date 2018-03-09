<?php
declare(strict_types=1);

namespace ARTFin\Plugins;


use ARTFin\ServiceContainerInterface;
use ARTFin\View\ViewRenderer;
use Interop\Container\ContainerInterface;


class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '../../../templates');
            $twig = new \Twig_Environment($loader);
            return $twig;
        });
        $container->addLazy(
            'view.renderer', function (ContainerInterface $container) {
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);
        }
        );


    }
}