<?php

namespace UserApi\Authorization;

use Laminas\ApiTools\MvcAuth\MvcAuthEvent;
use Db\Fixture\RoleFixture;

final class AuthorizationListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();
#die($mvcAuthEvent->getResource());

        $authorization->addResource('UserApi\V1\Rpc\Oidc\Controller::oidc');
        $authorization->allow(RoleFixture::GUEST, 'UserApi\V1\Rpc\Oidc\Controller::oidc');

        $authorization->addResource('UserApi\V1\Rpc\Me\Controller::me');
        $authorization->allow(RoleFixture::USER, 'UserApi\V1\Rpc\Me\Controller::me', 'GET');
    }
}
