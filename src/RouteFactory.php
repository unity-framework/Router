<?php

namespace Unity\Component\Router;

use Unity\Component\Container\Contracts\IContainer;
use Unity\Component\Router\Contracts\IRouteFactory;

class RouteFactory implements IRouteFactory
{
    protected $container;

    public function __construct(IContainer $container)
    {
        $this->container = $container;
    }

    public function make($uri, $callback)
    {
        return $this->container->make($route, [$uri, $callback]);
    }
}
