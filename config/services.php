<?php

use Jan\DependencyInjectionTests\HelloWorld;
use Jan\DependencyInjectionTests\MyFooProvider;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $container): void {
    $services = $container->services()
        ->defaults()
        ->autowire()      // Automatically injects dependencies in your services.
        ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
    ;

    // makes classes in /src/Jan/SymfonyDiTest available to be used as services
    // this creates a service per class whose id is the fully-qualified class name
    $services->load('Jan\\DependencyInjectionTests\\', __DIR__ . '/../src/');

    $services->set(MyFooProvider::class)
        ->arg('$foo', 'foo bar');

    $services->set(HelloWorld::class)->public();
};