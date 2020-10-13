<?php

return [
    'api-tools-oauth2' => [
        'allow_implicit' => true,
        'access_lifetime' => 1000000,
        'enforce_state'  => true,
        'always_issue_new_refresh_token' => false,
        'storage' => 'oauth2.doctrineadapter.default',
        'grant_types' => [],
    ],
];
