<?php

require __DIR__ . '/vendor/autoload.php';
$db = include __DIR__ . '/config/db.php';
list(
    'driver' => $adapter,
    'host' => $host,
    'database' => $name,
    'username' => $user,
    'password' => $pass,
    'charset' => $charset,
    'collation' => $collation
    ) = $db['default'];
return [
    'paths' => [
        'migrations' => [
            __DIR__ . '/db/migrations'
        ],
        'seeds' => [
            __DIR__ . '/db/seeds'
        ]
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'default',
        'default' => [
            'adapter' => $adapter,
            'host' => $host,
            'name' => $name,
            'user' => $user,
            'pass' => $pass,
            'charset' => $charset,
            'collation' => $collation
        ]
    ]
];