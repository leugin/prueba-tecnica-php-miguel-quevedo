<?php

namespace Leugin\TestDovfac;


use DI\Container;

class App
{
   private static $instance = null;
    private \DI\Container $container;

    public function __construct()
    {
        $configs = require (__DIR__ . '/../config/index.php');
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions($configs['providers']);
        $builder->useAutowiring(false);
        $builder->useAttributes(false);

        $container = $builder->build();
        $this->container = $container;
    }
    public function getContainer():Container
    {
        return $this->container;
    }

    public static function get(): App
    {
        if (self::$instance == null) {
            self::$instance = new App();
        }
        return self::$instance;
    }
}
