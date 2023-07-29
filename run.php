<?php

use Jan\DependencyInjectionTests\FooProvider;
use Jan\DependencyInjectionTests\HelloWorld;
use Jan\DependencyInjectionTests\MyFooProvider;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * This file will use dependency injection to get an instance of class HelloWorld
 */
// Register directories into the autoloader

$container = new Illuminate\Container\Container();

$container->get(HelloWorld::class)->sayHello();