<?php
declare(strict_types=1);

namespace ARTFin\Plugins;


use Aura\Router\RouterContainer;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use ARTFin\Application;
use ARTFin\Plugins\RoutePlugin;
use ARTFin\Plugins\ViewPlugin;
use ARTFin\ServiceContainer;
use ARTFin\ServiceContainerInterface;
use Zend\Diactoros\ServerRequestFactory;

class RoutePlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();
        /*Registrar as rotas da aplicação */
        $map = $routerContainer->getMap();
        /*Tem a função de identificar a rota q esta sendo acessada*/
        $matcher = $routerContainer->getMatcher();
        /*Tem a função de gerar links com base nas rotas registradas*/
        $generator = $routerContainer->getGenerator();
        $request = $this->getRequest();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);

        $container->addLazy('route', function (ContainerInterface $container){
            $matcher = $container->get('routing.matcher');
            $request = $container->get(RequestInterface::class);
            return $matcher->match($request);
        });
    }

    protected function getRequest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );

    }
}