<?php

namespace DbApi\Authorization;

use ZF\MvcAuth\MvcAuthEvent;
use Db\Fixture\RoleFixture;

final class AuthorizationListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();

#die($mvcAuthEvent->getResource());
    }
}
