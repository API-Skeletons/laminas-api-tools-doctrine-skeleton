<?php

namespace UserApi\V1\Rpc\Me;

use Application\Authentication\AuthenticationServiceAwareInterface;
use Application\Authentication\AuthenticationServiceAwareTrait;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\ApiTools\ContentNegotiation\ViewModel as ContentNegotiationViewModel;
use Laminas\ApiTools\Hal\Entity;
use Laminas\ApiTools\Hal\Link\Link;

class MeController extends AbstractActionController implements
    AuthenticationServiceAwareInterface
{
    use AuthenticationServiceAwareTrait;

    public function meAction()
    {
        $user = $this->getAuthenticationService()->getIdentity()->getUser();

        $entity = new Entity($user, $user->getId());

        $selfLink = Link::factory([
            'rel' => 'self',
            'route' => [
                'name' => 'user-api.rest.doctrine.user',
                'params' => [
                    'user_id' => $user->getId(),
                ],
            ],
        ]);

        $entity->getLinks()->add($selfLink);

        return new ContentNegotiationViewModel([
            'payload' => $entity,
        ]);
    }
}
