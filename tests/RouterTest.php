<?php

use PHPUnit\Framework\TestCase;
use Unity\Component\Router\Router;
use Psr\Http\Message\RequestInterface;
use Unity\Component\Router\Contracts\IRouteFactory;
use Unity\Component\Router\Contracts\IRoutesCollection;

class routeTest extends TestCase
{
    public function testGet()
    {
        $router = $this->getInstance();

        $router->get('/', function() {});
        $router->get('/hello', 'HelloController');
        $router->get('/ok', 'OkController@sendAnOk');
    }

    public function testPost()
    {
        $router = $this->getInstance();

        $router->post('/new-user', function() {});
        $router->post('/newsletter-subscribe', 'NewsletterController@subscribe');
    }

    public function getInstance()
    {
        $routesCollectionMock = $this->getRoutesCollection();
        $routesFactoryMock = $this->getRouteFactoryMock();
        $requestMock = $this->getRequestMock();

        return new Router($routesCollectionMock, $routesFactoryMock, $requestMock);
    }

    public function getRoutesCollection()
    {
        return $this->createMock(IRoutesCollection::class);
    }

    public function getRouteFactoryMock()
    {
        $routesFactoryMock = $this->createMock(IRouteFactory::class);

        $routesFactoryMock->expects($this->any())
            ->method('make');

        return $routesFactoryMock;
    }

    public function getRequestMock()
    {
        return $this->createMock(RequestInterface::class);
    }
}
