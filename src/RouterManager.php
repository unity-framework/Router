<?php

namespace Unity\Component\Router;

class RouterManager {
    /** @var string */
    protected $controllersPath = '';

    /** @var string */
    protected $viewsPath = '';

    /** @var IContainer */
    protected $container;

    public function setContainer(IContainer $container)
    {
        $this->container = $container;
    }

    public function setControllersPath($controllersPath)
    {
        $this->controllersPath = $controllersPath;
    }

    public function setViewsPath($viewsPath)
    {
        $this->viewsPath = $viewsPath;
    }

    public function build()
    {
        return $this->container->make('router', [$controllersPath, $viewsPath]);
    }
}
