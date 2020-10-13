<?php

namespace User\Authentication\Adapter;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use DoctrineModule\Authentication\Adapter\ObjectRepository;
use Db\Entity;

final class DoctrineAdapterFactory implements
    FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $objectManager = $container->get('doctrine.entitymanager.orm_default');

        $adapter = new ObjectRepository([
            'object_manager' => $objectManager,
            'identity_class' => Entity\User::class,
            'identity_property' => 'email',
            'credential_property' => 'password',
            'credential_callable' => function (Entity\User $user, $passwordValidate) {
                return password_verify($passwordValidate, $user->getPassword());
            }
        ]);

        return $adapter;
    }
}
