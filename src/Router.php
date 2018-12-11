<?php

namespace Unity\Component\Router;

use Psr\Http\Message\RequestInterface;
use Unity\Component\Router\Contracts\IRouter;
use Unity\Component\Router\Contracts\IRouteFactory;
use Unity\Component\Router\Contracts\IRoutesCollection;

class Router implements IRouter
{
    protected $request;

    /** @var IRoutesCollection */
    protected $route;

    public function __construct(
        IroutesCollection $routesCollection,
        IRouteFactory $routeFactory,
        RequestInterface $request
    ) {
        $this->routesCollection = $routesCollection;
        $this->routeFactory = $routeFactory;
        $this->request = $request;
    }

    public function all($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection
            ->set('get', $route)
            ->set('put', $route)
            ->set('post', $route)
            ->set('patch', $route)
            ->set('delete', $route)
            ->set('options', $route);

        return $route;
    }

    public function get($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection->set('get', $route);

        return $route;
    }

    public function post($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection->set('post', $route);

        return $route;
    }

    public function put($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection->set('put', $route);

        return $route;
    }

    public function patch($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection->set('patch', $route);

        return $route;
    }

    public function delete($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection->set('delete', $route);

        return $route;
    }

    public function options($uri, $callback)
    {
        $route = $this->getRouteFromFactory($uri, $callback);

        $this->routesCollection->set('options', $route);

        return $route;
    }

    public function match($methods, $uri, $callback)
    {
        //
    }

    public function getRouteFromFactory($uri, $callback)
    {
        return $this->routeFactory->make($uri, $callback);
    }

    public function intercept()
    {
        $response = $this->routerResolver->resolve($this->$request);

        return $response;
    }
}
