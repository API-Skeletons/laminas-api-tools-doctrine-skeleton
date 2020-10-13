<?php

namespace UserApi\V1\Rpc\Oidc;

use Interop\Container\ContainerInterface;

class OidcControllerFactory
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {

        $config = $container->get('config');

        return new OidcController($config['oidc']);
    }
}
