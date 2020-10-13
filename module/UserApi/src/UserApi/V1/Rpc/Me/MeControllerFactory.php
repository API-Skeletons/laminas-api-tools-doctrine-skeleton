<?php

namespace UserApi\V1\Rpc\Me;

class MeControllerFactory
{
    public function __invoke($controllers)
    {
        $authentication = $controllers->get('authentication');

        $instance = new MeController();
        $instance->setAuthenticationService($authentication);

        return $instance;
    }
}
