<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'UserApi\\Hydrator\\Filter\\UserDefault' => 'Laminas\\ServiceManager\\Factory\\InvokableFactory',
            'UserApi\\Hydrator\\Filter\\RoleDefault' => 'Laminas\\ServiceManager\\Factory\\InvokableFactory',
            'UserApi\\Hydrator\\Strategy\\IntegerToDate' => 'Laminas\ServiceManager\Factory\InvokableFactory',
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'UserApi\\V1\\Rpc\\Oidc\\Controller' => 'UserApi\\V1\\Rpc\\Oidc\\OidcControllerFactory',
            'UserApi\\V1\\Rpc\\Me\\Controller' => 'UserApi\\V1\\Rpc\\Me\\MeControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'user-api.rpc.oidc' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/.well-known/openid-configuration',
                    'defaults' => array(
                        'controller' => 'UserApi\\V1\\Rpc\\Oidc\\Controller',
                        'action' => 'oidc',
                    ),
                ),
            ),
            'user-api.rpc.me' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/me',
                    'defaults' => array(
                        'controller' => 'UserApi\\V1\\Rpc\\Me\\Controller',
                        'action' => 'me',
                    ),
                ),
            ),
            'user-api.rest.doctrine.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'UserApi\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
            'user-api.rest.doctrine.role' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/role[/:role_id]',
                    'defaults' => array(
                        'controller' => 'UserApi\\V1\\Rest\\Role\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'api-tools-versioning' => array(
        'uri' => array(
            0 => 'user-api.rpc.oidc',
            1 => 'user-api.rpc.me',
            2 => 'user-api.rest.doctrine.user',
            3 => 'user-api.rest.doctrine.role',
        ),
    ),
    'api-tools-rpc' => array(
        'UserApi\\V1\\Rpc\\Oidc\\Controller' => array(
            'service_name' => 'Oidc',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'user-api.rpc.oidc',
        ),
        'UserApi\\V1\\Rpc\\Me\\Controller' => array(
            'service_name' => 'Me',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'user-api.rpc.me',
        ),
    ),
    'api-tools-content-negotiation' => array(
        'controllers' => array(
            'UserApi\\V1\\Rpc\\Oidc\\Controller' => 'Json',
            'UserApi\\V1\\Rpc\\Me\\Controller' => 'HalJson',
            'UserApi\\V1\\Rest\\User\\Controller' => 'HalJson',
            'UserApi\\V1\\Rest\\Role\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'UserApi\\V1\\Rpc\\Oidc\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'UserApi\\V1\\Rpc\\Me\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'UserApi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'UserApi\\V1\\Rest\\Role\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'UserApi\\V1\\Rpc\\Oidc\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/json',
            ),
            'UserApi\\V1\\Rpc\\Me\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/json',
            ),
            'UserApi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/json',
            ),
            'UserApi\\V1\\Rest\\Role\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'api-tools-rest' => array(
        'UserApi\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'UserApi\\V1\\Rest\\User\\UserResource',
            'route_name' => 'user-api.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Db\\Entity\\User',
            'collection_class' => 'UserApi\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
        'UserApi\\V1\\Rest\\Role\\Controller' => array(
            'listener' => 'UserApi\\V1\\Rest\\Role\\RoleResource',
            'route_name' => 'user-api.rest.doctrine.role',
            'route_identifier_name' => 'role_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'role',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Db\\Entity\\Role',
            'collection_class' => 'UserApi\\V1\\Rest\\Role\\RoleCollection',
            'service_name' => 'Role',
        ),
    ),
    'api-tools-hal' => array(
        'metadata_map' => array(
            'Db\\Entity\\User' => array(
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'user-api.rest.doctrine.user',
                'hydrator' => 'UserApi\\V1\\Rest\\User\\UserHydrator',
            ),
            'UserApi\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'user-api.rest.doctrine.user',
                'is_collection' => true,
            ),
            'Db\\Entity\\Role' => array(
                'route_identifier_name' => 'role_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'user-api.rest.doctrine.role',
                'hydrator' => 'UserApi\\V1\\Rest\\Role\\RoleHydrator',
            ),
            'UserApi\\V1\\Rest\\Role\\RoleCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'user-api.rest.doctrine.role',
                'is_collection' => true,
            ),
        ),
    ),
    'api-tools' => array(
        'doctrine-connected' => array(
            'UserApi\\V1\\Rest\\User\\UserResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'UserApi\\V1\\Rest\\User\\UserHydrator',
            ),
            'UserApi\\V1\\Rest\\Role\\RoleResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'UserApi\\V1\\Rest\\Role\\RoleHydrator',
            ),
        ),
    ),
    'doctrine-hydrator' => array(
        'UserApi\\V1\\Rest\\User\\UserHydrator' => array(
            'entity_class' => 'Db\\Entity\\User',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'filters' => array(
                'artist_default' => array(
                    'condition' => 'and',
                    'filter' => 'UserApi\\Hydrator\\Filter\\UserDefault',
                ),
            ),
            'strategies' => array(
                'role' => 'ApiSkeletons\\Doctrine\\Hydrator\\Strategy\\CollectionExtract',
                'createdOn' => 'UserApi\\Hydrator\\Strategy\\IntegerToDate',
                'lastLogin' => 'UserApi\\Hydrator\\Strategy\\IntegerToDate',
            ),
            'use_generated_hydrator' => true,
        ),
        'UserApi\\V1\\Rest\\Role\\RoleHydrator' => array(
            'entity_class' => 'Db\\Entity\\Role',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'filters' => array(
                'role_default' => array(
                    'condition' => 'and',
                    'filter' => 'UserApi\\Hydrator\\Filter\\RoleDefault',
                ),
            ),
            'strategies' => array(),
            'use_generated_hydrator' => true,
        ),
    ),
    'api-tools-content-validation' => array(
        'UserApi\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'UserApi\\V1\\Rest\\User\\Validator',
        ),
        'UserApi\\V1\\Rest\\Role\\Controller' => array(
            'input_filter' => 'UserApi\\V1\\Rest\\Role\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'UserApi\\V1\\Rest\\User\\Validator' => array(
            0 => array(
                'name' => 'username',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            1 => array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            2 => array(
                'name' => 'password',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            3 => array(
                'name' => 'ipAddress',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            4 => array(
                'name' => 'salt',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            5 => array(
                'name' => 'activationCode',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            6 => array(
                'name' => 'forgottenPasswordCode',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            7 => array(
                'name' => 'forgottenPasswordTime',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
            8 => array(
                'name' => 'rememberCode',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            9 => array(
                'name' => 'createdOn',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
            10 => array(
                'name' => 'lastLogin',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\Digits',
                    ),
                ),
                'validators' => array(),
            ),
            11 => array(
                'name' => 'active',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
            12 => array(
                'name' => 'firstName',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            13 => array(
                'name' => 'lastName',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            14 => array(
                'name' => 'company',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            15 => array(
                'name' => 'phone',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            16 => array(
                'name' => 'apikeyRead',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            17 => array(
                'name' => 'apikeyWrite',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            18 => array(
                'name' => 'property',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            19 => array(
                'name' => 'equipment',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
            20 => array(
                'name' => 'chartType',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
        ),
        'UserApi\\V1\\Rest\\Role\\Validator' => array(
            0 => array(
                'name' => 'roleId',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
            1 => array(
                'name' => 'description',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Laminas\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Laminas\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(),
            ),
        ),
    ),
);
