<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * This file will use dependency injection to get an instance of class HelloWorld
 */

use Aura\Di\ContainerBuilder;
use Jan\DependencyInjectionTests\FooProvider;
use Jan\DependencyInjectionTests\HelloWorld;
use Jan\DependencyInjectionTests\MyFooProvider;

$builder = new ContainerBuilder();

$di = $builder->newInstance($builder::AUTO_RESOLVE);

// Aura.Di cannot resolve interfaces with only one class implementing them
$di->types[FooProvider::class] = $di->lazyNew(MyFooProvider::class, ['aura.di']);

$di->newInstance(HelloWorld::class)->sayHello();