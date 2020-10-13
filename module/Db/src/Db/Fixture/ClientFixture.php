<?php

namespace Db\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use ApiSkeletons\OAuth2\Doctrine\Entity\Client;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ClientFixture implements
    FixtureInterface
{
    public function load(ObjectManager $objectManager)
    {
        $hydrator = new DoctrineHydrator($objectManager, false);

        $data = [
            [
                'clientId' => 'skeleton',
                'redirectUri' => 'http://docker.localhost:4200/login',
                'grantType' => ['implicit'],
            ],
        ];

        foreach ($data as $row) {
            $entity = $objectManager
                ->getRepository(Client::class)
                ->findOneBy([
                    'clientId' => $row['clientId'],
                ]);

            if (! $entity) {
                $entity = new Client();
            }

            $hydrator->hydrate($row, $entity);
            $objectManager->persist($entity);

            $objectManager->flush();
        }
    }
}
