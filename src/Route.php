<?php

namespace Unity\Component\Router;

use Unity\Component\Router\Contracts\IRoute;
use Unity\Component\Router\Contracts\IRouteGroup;

class Route implements IRoute
{
    protected $method;
    protected $name;
    protected $uri;

    /** @var IRouterCollection */
    protected $routeCollection;

    public function __construct(IRouteCollection $routeCollection)
    {
        $this->$routeCollection = $routeCollection;
    }

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
