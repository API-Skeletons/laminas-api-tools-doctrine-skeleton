<?php

namespace Application\Authorization;

use Laminas\ApiTools\MvcAuth\MvcAuthEvent;

/**
 * This class exists so there is a single on/off switch for security
 * This file is ignored by git to reduce the chance of accidentaly
 * commiting the file in an off state.
 */
final class AuthorizationDenyAllListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();

        // Deny from all
        $authorization->deny();
    }
}
