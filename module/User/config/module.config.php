<?php

namespace User;

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'aliases' => [
            'Laminas\Authentication\AuthenticationService' => 'authentication',
         ],
        'factories' => [
            'User\Authentication\Adapter\DoctrineAdapter'
                => Authentication\Adapter\DoctrineAdapterFactory::class,
            'DoctrineModule\Authentication\Adapter\ObjectRepository'
                => Authentication\Adapter\DoctrineAdapterFactory::class,
        ],
    ],
    'session_storage' => [
        'type' => 'Zend\Session\Storage\SessionArrayStorage',
    ],
    'view_helpers' => [
        'aliases' => [
            'request' => View\Helper\RequestHelper::class,
        ],
        'factories' => [
            View\Helper\RequestHelper::class => View\Helper\RequestHelperFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => Controller\LoginControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'login' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'logout' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/logout',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'logout',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'oauth/authorize' => __DIR__ . '/../view/api-tools/auth/authorize.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
