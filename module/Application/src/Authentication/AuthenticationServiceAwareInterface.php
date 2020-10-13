<?php

namespace Application\Authentication;

use Laminas\Authentication\AuthenticationService;

interface AuthenticationServiceAwareInterface
{
    public function setAuthenticationService(AuthenticationService $authenticationService);
    public function getAuthenticationService();
}
