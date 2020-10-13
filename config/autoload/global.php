<?php

return array(
    'api-tools-mvc-auth' => array(
        'authentication' => array(
            'map' => array(
                'QueueApi\\V1' => 'oauth_doctrine',
                'QueryApi\\V1' => 'oauth_doctrine',
                'UserApi\\V1' => 'oauth_doctrine',
                'Laminas\\ApiTools\\OAuth2' => 'user',
            ),
        ),
    ),
);
