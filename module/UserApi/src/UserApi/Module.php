<?php

namespace UserApi;

use Laminas\EventManager\EventInterface;
use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Laminas\ApiTools\Provider\ApiToolsProviderInterface;

class Module implements ApiToolsProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        $eventManager = $e->getParam('application')->getEventManager();
        $serviceManager = $e->getParam('application')->getServiceManager();

        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new Authorization\AuthorizationListener(),
            100 // Less than 1000 to allow roles to be added first && >= 100
        );
    }
}
