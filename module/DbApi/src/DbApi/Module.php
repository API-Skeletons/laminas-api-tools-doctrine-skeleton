<?php
namespace DbApi;

use Laminas\ApiTools\Provider\ApiToolsProviderInterface;
use Laminas\EventManager\EventInterface;
use Laminas\ModuleManager\Feature\BootstrapListenerInterface;
use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Laminas\Stdlib\ArrayUtils;

class Module implements
    ApiToolsProviderInterface,
    BootstrapListenerInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Laminas\ApiTools\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
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

        $halEventSubscriberManager =
            $serviceManager->get(EventSubscriber\Hal\HalEventSubscriberManager::class);
        $halEventSubscriberManager->subscribe();
    }
}
