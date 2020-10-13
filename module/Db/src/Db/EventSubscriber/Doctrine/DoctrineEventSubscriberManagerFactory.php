<?php

namespace Db\EventSubscriber\Doctrine;

use Interop\Container\ContainerInterface;

final class DoctrineEventSubscriberManagerFactory
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $objectManager = $container->get('doctrine.entitymanager.orm_default');
        $config = $container->get('config');

        $instance = new $requestedName($config['doctrine-event-subscriber']);
        $instance->setServiceLocator($container);
        $instance->setObjectManager($objectManager);

        return $instance;
    }
}
