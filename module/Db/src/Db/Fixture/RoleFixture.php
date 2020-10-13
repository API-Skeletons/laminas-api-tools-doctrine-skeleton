<?php

namespace Db\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Db\Entity\Role;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class RoleFixture implements
    FixtureInterface
{
    const ADMIN_ID = 1;
    const MEMBER_ID = 2;
    const GUEST_ID = 3;

    const ADMIN = 'admin';
    const MEMBER = 'members'; // <sic>
    const GUEST = 'guest';

    public function load(ObjectManager $objectManager)
    {
        $hydrator = new DoctrineHydrator($objectManager, false);

        $data = [
            [
                'id' => self::GUEST_ID,
                'roleId' => self::GUEST,
                'parent' => null,
                'description' => 'Anonymous',
            ],
            [
                'id' => self::MEMBER_ID,
                'roleId' => self::MEMBER,
                'parent' => self::GUEST_ID,
                'description' => 'General Users',
            ],
            [
                'id' => self::ADMIN_ID,
                'roleId' => self::ADMIN,
                'parent' => self::MEMBER_ID,
                'description' => 'Administrator',
            ],
        ];

        foreach ($data as $row) {
            $entity = $objectManager
                ->getRepository(Role::class)
                ->find($row['id']);

            if (! $entity) {
                $entity = new Role();
            }

            if ($row['parent']) {
                $row['parent'] = $objectManager
                    ->getRepository(Role::class)
                    ->find($row['parent']);
            }

            $hydrator->hydrate($row, $entity);
            $objectManager->persist($entity);

            $objectManager->flush();
        }
    }
}
