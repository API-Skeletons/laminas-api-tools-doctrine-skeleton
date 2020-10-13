<?php

namespace UserApi\V1\Rpc\Oidc;

use Laminas\Mvc\Controller\AbstractActionController;

class OidcController extends AbstractActionController
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function oidcAction()
    {
        return $this->config;
    }
}
