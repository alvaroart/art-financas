<?php

declare(strict_types=1);
namespace ARTFin\Plugins;


use ARTFin\View\Twig\TwigGlobals;
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
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new \Twig_Environment($loader);

            $auth = $container->get('auth');

            $generator = $container->get('routing.generator');
            $twig->addExtension(new TwigGlobals($auth));
            $twig->addFunction(new \Twig_SimpleFunction('route',
                function (string $name, array $params = []) use($generator){
                    return $generator->generate($name, $params);
                }));
            return $twig;
        });
        $container->addLazy('view.renderer', function (ContainerInterface $container) {
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);
        });
    }
}