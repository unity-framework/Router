<?php

namespace Unity\Component\Router;

use Zend\Diactoros\Response;
use Unity\Component\Router\Router;
use Unity\Component\Router\Contracts\IRouteCollection;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\ServerRequestFactory;
use Unity\Component\Router\RouteResolver;
use Unity\Component\Router\RouteCollection;
use Unity\Component\Container\Contracts\IContainer;
use Unity\Component\Container\Contracts\IServiceProvider;

class RouterServiceProvider implements IServiceProvider
{
    public function register(IContainer $container)
    {
        $container->set('request', function() {
            $request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
                $_SERVER,
                $_GET,
                $_POST,
                $_COOKIE,
                $_FILES
            );

            return $request;
        });

        $container->set('response', Response::class);
        $container->set('routerCollection', RouteCollection::class);

        $container->set('routeResolver', RouteResolver::class)
            ->bind(ResponseInterface::class, function() {
                return $container->make('response');
            });

        $container->set('router', Router::class)
            ->bind(RequestInterface::class, function($container) {
                return $container->make('request');
            })
            ->bind(IRouteCollection::class, function($container) {
                return $container->get('routeCollection');
            });
    }
}
