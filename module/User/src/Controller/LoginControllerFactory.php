<?php

namespace User\Controller;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use DoctrineModule\Authentication\Adapter\ObjectRepository;

final class LoginControllerFactory implements
    FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authenticationService = $container->get('authentication');
        $authenticationAdapter = $container->get(ObjectRepository::class);
        $objectManager = $container->get('doctrine.entitymanager.orm_default');

        return new $requestedName($authenticationService, $authenticationAdapter, $objectManager);
    }
}
