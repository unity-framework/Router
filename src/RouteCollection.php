<?php

namespace Unity\Component\Router;

use Unity\Component\Router\Contracts\IRouteCollection;

class RouteCollection implements IRouteCollection
{
    /**
     * Contains the collection of
     * registered routes
     *
     * @var Array
     */
    protected $routes = [];
}
