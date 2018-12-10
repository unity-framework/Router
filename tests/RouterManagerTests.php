<?php

use PHPUnit\Framework\TestCase;
use Unity\Component\Router\RouterServiceProvider;
use Unity\Component\Container\Contracts\IContainer;
use Unity\Component\Container\Contracts\Dependency\IDependencyResolver;

class RouteManagerTest extends TestCase
{
    public function testRegister()
    {
        $containerMock         = $this->getContainerMock();
        $routerServiceProvider = $this->getRouterServiceProvider();

        $routerServiceProvider->register($containerMock);
    }

    public function getRouterServiceProvider()
    {
        return new RouterServiceProvider();
    }

    public function getContainerMock()
    {
        $dependencyResolverMock = $this->getDependencyResolverMock();

        $containerMock = $this->createMock(IContainer::class);

        $containerMock
            ->expects($this->exactly(5))
            ->method('set')
            ->will($this->returnValue($dependencyResolverMock));

        return $containerMock;
    }

    public function getDependencyResolverMock()
    {
        $dependencyResolverMock = $this->createMock(IDependencyResolver::class);

        $dependencyResolverMock
            ->expects($this->exactly(3))
            ->method('bind')
            ->will($this->returnValue($dependencyResolverMock));

        return $dependencyResolverMock;
    }
}
