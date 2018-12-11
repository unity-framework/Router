<?php

namespace Unity\Component\Router;

use Psr\Http\Message\RequestInterface;
use Unity\Component\Router\Contracts\IRoutesCollection;

class RoutesCollection implements IRoutesCollection
{
    protected $routes = [
        'get' => [],
        'put' => [],
        'post' => [],
        'patch' => [],
        'delete' => [],
        'options' => []
    ];

    public function set($method, $route)
    {
        $routeUri = $route->getUri();

        $this->routes[$method][$routeUri] = $route;
    }

    public function get($method)
    {
        if ($this->has($method)) {
            return $this->routes[$method];
        }

        return false;
    }

    public function has($method)
    {
        return array_key_exists($method, $this->$routes);
    }
}
