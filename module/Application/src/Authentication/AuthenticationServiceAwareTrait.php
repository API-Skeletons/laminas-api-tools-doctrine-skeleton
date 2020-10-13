<?php

namespace Application\Authentication;

use Laminas\Authentication\AuthenticationService;

trait AuthenticationServiceAwareTrait
{
    protected $authenticationService;

    public function setAuthenticationService(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function getAuthenticationService()
    {
        return $this->authenticationService;
    }
}
