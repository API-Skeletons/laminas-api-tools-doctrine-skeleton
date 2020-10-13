<?php

namespace DbApi\EventSubscriber\Hal;

use Zend\EventManager\SharedEventManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use Application\Authentication\AuthenticationServiceAwareInterface;
use Application\Authentication\AuthenticationServiceAwareTrait;

abstract class AbstractEventSubscriber implements
    AuthenticationServiceAwareInterface,
    ObjectManagerAwareInterface
{
    use AuthenticationServiceAwareTrait;
    use ProvidesObjectManager;

    protected $listeners;

    // @codeCoverageIgnoreStart
    public function detach(SharedEventManager $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    // @codeCoverageIgnoreEnd
}
