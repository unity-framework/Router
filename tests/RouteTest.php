<?php

use PHPUnit\Framework\TestCase;
use Unity\Component\Route\Route;
use Unity\Component\Router\Contracts\IRouteCollection;

class routeTest extends TestCase
{
    public function testGet()
    {
        $route = $this->getRoute();

        $route->get('/', function() {});
        $route->get('/hello', 'HelloController');
        $route->get('/ok', 'OkController@sendAnOk');
    }

    public function testPost()
    {
        $route = $this->getRoute();

        $route->post('/new-user', function() {});
        $route->post('/newsletter-subscribe', 'NewsletterController@subscribe');
    }

    public function getRoute()
    {
        $routeCollectionMock = $this->getRouteCollection();

        return new Route($routeCollectionMock);
    }

    public function getRouteCollection()
    {
        $routeCollectionMock = $this->createMock(IRouteCollection::class);

        $routeCollectionMock->expects($this->exactly(3))
            ->method('get');

        return $routeCollectionMock;
    }
}
