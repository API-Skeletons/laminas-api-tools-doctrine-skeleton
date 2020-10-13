<?php

namespace User;

use Laminas\ModuleManager\Feature\BootstrapListenerInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\EventManager\EventInterface;
use Laminas\Mvc\ModuleRouteListener;
use Laminas\Mvc\MvcEvent;
use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Laminas\ApiTools\MvcAuth\Authentication\DefaultAuthenticationListener;
use Laminas\Authentication\Storage\Session as SessionStorage;

final class Module implements
    BootstrapListenerInterface,
    ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        $app = $e->getParam('application');
        $container = $app->getServiceManager();

        if(! defined('STDIN')) {

            // Not running from cli

            // Start the session manager
            try {
                // Instantiate the session handler class
                $container->get('Laminas\Session\SessionManager')->start();
            } catch (Exception $e) {
                // Unimportant if fails
            }
        }

        $eventManager = $app->getEventManager();

        // Load resources
        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new Authorization\AuthorizationListener(),
            100
        );

        // Add Authentication Adapter for webauth / login session
        $objectManager = $container->get('doctrine.entitymanager.orm_default');
        $defaultAuthenticationListener = $container->get(DefaultAuthenticationListener::class);
        $defaultAuthenticationListener->attach(new Authentication\AuthenticationAdapter($objectManager));
    }
}
