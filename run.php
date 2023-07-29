<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * This file will use dependency injection to get an instance of class HelloWorld
 */

use Jan\DependencyInjectionTests\HelloWorld;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

$container = new ContainerBuilder();

$loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/config'));
$loader->load('services.php');

$container->compile();

$helloWorld = $container->get(HelloWorld::class);

$helloWorld->sayHello();