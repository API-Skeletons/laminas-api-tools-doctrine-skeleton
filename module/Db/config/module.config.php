<?php

namespace Db;

use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'doctrine' => [
        'driver' => [
            'db_driver' => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                'paths' => [
                    realpath(__DIR__ . '/orm'),
                ],
            ],
            'orm_default' => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
                'drivers' => [
                    'Db\\Entity' => 'db_driver',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'metadata_cache'    => 'db_redis',
                'query_cache'       => 'db_redis',
                'result_cache'      => 'db_redis',
            ],
        ],
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => realpath(__DIR__ . '/../src/Db/Migration'),
                'name'      => 'Doctrine Database Migrations',
                'namespace' => 'Db\Migration',
                'table'     => 'Migrations',
                'column'    => 'version',
            ],
        ],

        'fixture' => [
            'default' => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'factories' => [
                    Fixture\RoleFixture::class => InvokableFactory::class,
                ],
            ],
            'development' => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'factories' => [
                    Fixture\ClientFixture::class => InvokableFactory::class,
                    Fixture\UserFixture::class => InvokableFactory::class,
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            'doctrine.cache.db_redis' => Cache\Doctrine\RedisCacheFactory::class,
            EventSubscriber\Doctrine\DoctrineEventSubscriberManager::class =>
                EventSubscriber\Doctrine\DoctrineEventSubscriberManagerFactory::class,
        ],
    ],

    'doctrine-event-subscriber' => [
        'factories' => [
            EventSubscriber\Doctrine\CreatedAtField::class
                => InvokableFactory::class,
            EventSubscriber\Doctrine\UpdatedAtField::class
                => InvokableFactory::class,
        ],
    ],
];
