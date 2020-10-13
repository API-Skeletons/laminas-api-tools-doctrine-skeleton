<?php

declare(strict_types=1);

namespace Db;

use Laminas\EventManager\EventInterface;

class Module
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function onBootstrap(EventInterface $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();

        $objectManager = $serviceManager->get('doctrine.entitymanager.orm_default');
        $objectManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        // Subscribe all Doctrine Event Listeners
        $serviceManager
            ->get(EventSubscriber\Doctrine\DoctrineEventSubscriberManager::class)
            ->subscribe()
            ;
    }
}
