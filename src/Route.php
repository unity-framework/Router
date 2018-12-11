<?php

namespace Unity\Component\Router;

use Unity\Component\Router\Contracts\IRoute;
use Unity\Component\Router\Contracts\IRouteGroup;

class Route implements IRoute
{
    protected $name;
    protected $uriTemplate;
    protected $callback;

    /**
     * @inject
     *
     * @var IRouteGroupFactory
     */
    protected $routeGroupFactory;

    public function group($name, $uriPrefix, $data)
    {
        return $this->routeGroupFactory->make($name, $uriPrefix, $data);
    }
}
