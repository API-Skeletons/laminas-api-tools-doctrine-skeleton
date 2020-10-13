<?php

namespace DbApi\EventSubscriber\Hal;

use Interop\Container\ContainerInterface;
use Db\ConfigProvider;

final class HalEventSubscriberManagerFactory
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $config = $container->get('config');
        $authenticationService = $container->get('authentication');
        $sharedEventManager = $container->get('SharedEventManager');
        $objectManager = $container->get('doctrine.entitymanager.orm_default');

        $instance = new $requestedName($config['hal-event-subscriber']);
        $instance->setAuthenticationService($authenticationService);
        $instance->setSharedEventManager($sharedEventManager);
        $instance->setObjectManager($objectManager);

        return $instance;
    }
}
