<?php

return array(
    'service_manager' => array(
        'invokables' => array(
            'DoctrineModule\\Stdlib\\Hydrator\\Strategy\\AllowRemoveByValue' => 'DoctrineModule\\Stdlib\\Hydrator\\Strategy\\AllowRemoveByValue',
            'DbApi\\EventSubscriber\\Rest\\UserPatchPost' => 'DbApi\\EventSubscriber\\Rest\\UserPatchPost',
        ),
        'factories' => array(
            'DbApi\\EventSubscriber\\Hal\\HalEventSubscriberManager' => 'DbApi\\EventSubscriber\\Hal\\HalEventSubscriberManagerFactory',
        ),
    ),
    'hal-event-subscriber' => array(
        'factories' => array(
            'DbApi\\EventSubscriber\\Hal\\UserEventSubscriber' => 'Zend\\ServiceManager\\Factory\\InvokableFactory',
        ),
    ),
);
