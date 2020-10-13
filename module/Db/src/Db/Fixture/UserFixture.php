<?php

namespace Db\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Db\Entity\User;
use Db\Entity\Role;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class UserFixture implements
    FixtureInterface
{
    public function load(ObjectManager $objectManager)
    {
        $hydrator = new DoctrineHydrator($objectManager, false);

        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'ipAddress' => '0',
                'createdOn' => '0',
            ],
        ];

        foreach ($data as $row) {
            $entity = $objectManager
                ->getRepository(User::class)
                ->findOneBy([
                    'username' => $row['username']
                ]);

            if (! $entity) {
                $entity = new User();
            }

            $hydrator->hydrate($row, $entity);
            $objectManager->persist($entity);


            if (! sizeof($entity->getRole())) {
                $admin = $objectManager
                    ->getRepository(Role::class)
                    ->findOneBy([
                        'roleId' => 'admin'
                    ]);

                $entity->addRole($admin);
                $admin->addUser($entity);
            }


            $objectManager->flush();
        }
    }
}
