<?php

use Jan\DependencyInjectionTests\FooProvider;
use Jan\DependencyInjectionTests\HelloWorld;
use Jan\DependencyInjectionTests\MyFooProvider;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * This file will use dependency injection to get an instance of class HelloWorld
 */
$containerBuilder = new DI\ContainerBuilder();

$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions([
    FooProvider::class => DI\autowire(
        MyFooProvider::class
    )->constructorParameter('foo', 'php-di')
]);

$container = $containerBuilder->build();

$helloWorld = $container->get(HelloWorld::class);
$helloWorld->sayHello();