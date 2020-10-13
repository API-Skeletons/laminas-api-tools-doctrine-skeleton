<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application;

use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Laminas\EventManager\EventInterface;
use Laminas\Http\PhpEnvironment\Response;
use Laminas\Mvc\ModuleRouteListener;
use Laminas\Uri\UriFactory;

class Module
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(EventInterface $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();
        $response = $serviceManager->get('response');

        if ($response instanceof Response) {
            UriFactory::registerScheme('chrome-extension', 'Zend\Uri\Uri');
        }

        // Start the session manager
        # Move to User module
        /*
        try {
            $event
                ->getParam('application')
                ->getServiceManager()
                ->get('Zend\Session\SessionManager')
                ->start()
                ;
        } catch (Exception $e) {
            // Unimportant if fails
        }
        */

        $eventManager = $event->getParam('application')->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // Load resources
        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new Authorization\AuthorizationDenyAllListener(),
            101 // Less than 1000 to allow roles to be added first && >= 100
        );

        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new Authorization\AuthorizationListener(),
            100 // Less than 1000 to allow roles to be added first && >= 100
        );

        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION_POST,
            new Authorization\UnauthorizedListener(),
            150
        );
    }
}
