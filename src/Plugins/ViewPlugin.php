<?php

declare(strict_types=1);
namespace ARTFin\Plugins;


use ARTFin\View\ViewRenderer;
use Aura\Router\RouterContainer;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use ARTFin\ServiceContainerInterface;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Zend\Diactoros\ServerRequestFactory;

class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new Twig_Environment($loader);
            return $twig;
        });
        $container->addLazy('view.renderer', function (ContainerInterface $container) {
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);
        });
    }
}