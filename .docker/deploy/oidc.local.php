<?php

return [
    'oidc' => [
        'issuer' => 'https://api.iopro.com.au',
        'authorization_endpoint' => 'https://api.iopro.com.au/oauth/authorize',
        'token_endpoint' => 'https://api.iopro.com.au/oauth/token',
        'userinfo_endpoint' => 'https://api.iopro.com.au/me',
        'scopes_supported' => [],
        'response_types_supported' => [
            'token'
        ],
    ],
];
