<?php

namespace DbApi\EventSubscriber\Hal;

use Zend\EventManager\SharedEventManager;
use Zend\EventManager\Event;
use ZF\OAuth2\Doctrine\Identity\AuthenticatedIdentity;
use ZF\Hal\Plugin\Hal;
use Db\Entity;
use Db\Fixture\RoleFixture;

final class UserEventSubscriber extends AbstractEventSubscriber
{
    public function attach(SharedEventManager $events, $priority = 1)
    {
        $events->attach(
            Hal::class,
            'renderEntity.post',
            [$this, 'onRenderEntityPost'],
            $priority
        );
    }

    public function onRenderEntityPost(Event $event)
    {
        if (! $event->getParam('entity')->getEntity() instanceof Entity\User) {
            return;
        }

        if (! $this->getAuthenticationService()->getIdentity() instanceof AuthenticatedIdentity) {
            return;
        }

        $event->getParam('payload')['_computed']['example'] = true;
    }
}
