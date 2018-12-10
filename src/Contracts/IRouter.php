<?php

namespace Unity\Component\Router\Contracts;

interface IRouter
{
    public function intercept();
    public function all($uri, $callback);
    public function get($uri, $callback);
    public function post($uri, $callback);
    public function put($uri, $callback);
    public function patch($uri, $callback);
    public function delete($uri, $callback);
    public function options($uri, $callback);
    public function match($methods, $uri, $callback);
}
