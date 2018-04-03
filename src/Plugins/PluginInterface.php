<?php


namespace ARTFin\Plugins;


use ARTFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}
?>