<?php

namespace User\Authorization;

use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Db\Fixture\RoleFixture;

final class AuthorizationListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();
#        print_r(($mvcAuthEvent->getResource()));die();

        // Website/User urls
        $authorization->addResource('User\Controller\LoginController::login');
        $authorization->allow(RoleFixture::GUEST, 'User\Controller\LoginController::login');

        $authorization->addResource('User\Controller\LoginController::logout');
        $authorization->allow(RoleFixture::GUEST, 'User\Controller\LoginController::logout');

        // Allow from all for oauth authentication
        $authorization->addResource('Laminas\ApiTools\OAuth2\Controller\Auth::authorize');
        $authorization->allow(RoleFixture::MEMBER, 'Laminas\ApiTools\OAuth2\Controller\Auth::authorize');

        $authorization->addResource('Laminas\ApiTools\OAuth2\Controller\Auth::revoke');
        $authorization->allow(RoleFixture::MEMBER, 'Laminas\ApiTools\OAuth2\Controller\Auth::revoke');
    }
}
