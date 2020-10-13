<?php

namespace Application\Authorization;

use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Db\Fixture\RoleFixture;

final class AuthorizationListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();

#die($mvcAuthEvent->getResource());

        // Allow admin access to the ZF Admin console
        if (substr($mvcAuthEvent->getResource(), 0, 19) == 'Laminas\\ApiTools\\Admin\\') {
            $authorization->addResource($mvcAuthEvent->getResource());
            $authorization->allow(RoleFixture::ADMIN, $mvcAuthEvent->getResource());
        }

        if (substr($mvcAuthEvent->getResource(), 0, 28) == 'Laminas\\ApiTools\\Doctrine\\Admin\\') {
            $authorization->addResource($mvcAuthEvent->getResource());
            $authorization->allow(RoleFixture::ADMIN, $mvcAuthEvent->getResource());
        }

        $authorization->addResource('Application\Controller\IndexController::index');
        $authorization->allow(RoleFixture::GUEST, 'Application\Controller\IndexController::index');
    }
}
