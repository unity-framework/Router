<?php

namespace Unity\Component\Router\Contracts;

interface IRoutesCollection
{
    public function set($method, $callback);
    public function get($method);
}
