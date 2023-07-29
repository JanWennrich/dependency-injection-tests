<?php

namespace Jan\DependencyInjectionTests;

class HelloWorld
{
    public function __construct(protected FooProvider $fooProvider)
    {
    }

    public function sayHello(): void
    {
        echo $this->fooProvider->getFoo();
    }
}