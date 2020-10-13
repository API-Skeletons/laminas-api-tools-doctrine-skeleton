<?php

namespace DbApi\EventSubscriber\Hal;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceManager as ZendServiceManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use Application\Authentication\AuthenticationServiceAwareInterface;
use Application\Authentication\AuthenticationServiceAwareTrait;
use Db\ConfigProvider;

final class HalEventSubscriberManager extends ZendServiceManager implements
    AuthenticationServiceAwareInterface,
    ObjectManagerAwareInterface
{
    use AuthenticationServiceAwareTrait;
    use ProvidesObjectManager;

    private $sharedEventManager;

    public function setSharedEventManager($sharedEventManager)
    {
        $this->sharedEventManager = $sharedEventManager;

        return $this;
    }

    public function getSharedEventManager()
    {
        return $this->sharedEventManager;
    }

    public function subscribe()
    {
        foreach ($this->factories as $name => $squishedname) {
            $instance = $this->get($name);
            $instance->setAuthenticationService($this->getAuthenticationService());
            $instance->setObjectManager($this->getObjectManager());

            $instance->attach($this->getSharedEventManager());
        }
    }
}
