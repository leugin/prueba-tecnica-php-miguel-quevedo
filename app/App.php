<?php

namespace Leugin\TestDovfac;


class App
{
    private \DI\Container $container;

    public function __construct()
    {
        $configs = require_once (__DIR__ . '/../config/index.php');
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions($configs['providers']);
        $builder->useAutowiring(false);
        $builder->useAttributes(false);

        $container = $builder->build();
        $this->container = $container;
    }
    public function getContainer()
    {
        return $this->container;
    }
}
