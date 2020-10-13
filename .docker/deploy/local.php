<?php

return [
    'wwwUrl' => 'https://report.iopro.com.au',
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\\DBAL\\Driver\\PDOMySql\\Driver',
                'params' => [
                    'user' => 'report_api',
                    'password' => 'hmuU2wuoGsc3aG81YR48',
                    'host' => '10.240.0.38',
                    'dbname' => 'zd7k9xp_monitor_data',
                    'port' => '3306',
                    'charset' => 'utf8mb4',
                    'collate' => 'utf8mb4_unicode_ci',
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
    ],

    'redis' => [
        'db' => [
            'server' => 'localhost',
            'port' => '6379',
        ],
    ],

    'session_config' => [
        'phpSaveHandler' => 'redis',
        'savePath' => 'tcp://localhost:6379?weight=1&timeout=1',
    ],
];
