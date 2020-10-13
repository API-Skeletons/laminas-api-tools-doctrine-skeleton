<?php

namespace Db\EventSubscriber\Doctrine;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\ServiceManager as LaminasServiceManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;

final class DoctrineEventSubscriberManager extends LaminasServiceManager implements
    ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    private $serviceLocator;

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ContainerInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    public function subscribe()
    {
        foreach ((array)$this->factories as $name => $squishedname) {
            $instance = $this->get($name);
            $instance->setAuthentication($this->getServiceLocator()->get('authentication'));

            $this->getObjectManager()->getEventManager()->addEventSubscriber($instance);
        }
    }
}
