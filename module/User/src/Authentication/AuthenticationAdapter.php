<?php

namespace User\Authentication;

use Db\Entity;
use Db\Fixture\RoleFixture;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use Laminas\Http\Request;
use Laminas\Http\Response;
use Laminas\Session\Container;
use Laminas\ApiTools\MvcAuth\Authentication\AdapterInterface;
use Laminas\ApiTools\MvcAuth\Identity\IdentityInterface;
use Laminas\ApiTools\MvcAuth\MvcAuthEvent;

final class AuthenticationAdapter implements
    AdapterInterface,
    ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    public function __construct($objectManager)
    {
        $this->setObjectManager($objectManager);
    }

    public function provides()
    {
        return [
            'user',
        ];
    }

    public function matches($type)
    {
        return $type == 'user';
    }

    public function getTypeFromRequest(Request $request)
    {
        return false;
    }

    public function preAuth(Request $request, Response $response)
    {
    }

    public function authenticate(Request $request, Response $response, MvcAuthEvent $mvcAuthEvent)
    {
        $session = new Container('webauth');

        if ($session->offsetGet('auth')) {
            $user = $this->getObjectManager()
                ->getRepository(Entity\User::class)
                ->find($session->offsetGet('auth'));

            if ($user) {
                $webIdentity = new Identity\WebIdentity($user);

                // Add top level role for this user to the identity
                if ($user->hasRole(RoleFixture::ADMIN)) {
                    $webIdentity->setName(RoleFixture::ADMIN);
                } else {
                    $webIdentity->setName(RoleFixture::MEMBER);
                }

                return $webIdentity;
            }
        }

        // Force login for all other routes
        $mvcAuthEvent->stopPropagation();
        if (! $session->offsetGet('redirect')) {
            $session->offsetSet('redirect', $request->getUriString());
        }
        $response->getHeaders()->addHeaderLine('Location', '/login');
        $response->setStatusCode(302);

        return $response;
    }
}
