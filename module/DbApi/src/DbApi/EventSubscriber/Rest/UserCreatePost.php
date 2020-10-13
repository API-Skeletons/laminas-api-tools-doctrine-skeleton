<?php

namespace DbApi\EventSubscriber\Rest;

use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Db\Entity;

class UserCreatePost implements ListenerAggregateInterface
{
    protected $listeners = [];

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            DoctrineResourceEvent::EVENT_CREATE_POST,
            [$this, 'createPost']
        );
    }

    // When a user adds a new source add any checksums
    public function createPost(DoctrineResourceEvent $event)
    {
        $user = $event->getEntity();

        return;
    }

    // @codeCoverageIgnoreStart
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            $events->detach($listener);
            unset($this->listeners[$index]);
        }
    }
    // @codeCoverageIgnoreEnd
}
