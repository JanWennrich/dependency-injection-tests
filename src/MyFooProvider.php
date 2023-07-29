<?php

namespace Jan\DependencyInjectionTests;

class MyFooProvider implements FooProvider
{
    public function __construct(protected string $foo)
    {
    }

    public function getFoo(): string
    {
        return $this->foo;
    }
}