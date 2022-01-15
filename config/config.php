<?php
declare(strict_types=1);

use Phalcon\Logger;

$config = [
    'database'    => [
        'adapter'  => env('DB_ADAPTER'),
        'host'     => env('DB_HOST'),
        'port'     => env('DB_PORT'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'dbname'   => env('DB_NAME'),
    ],
    'application' => [
        'migrationsDir'     => root_path('migrations/'),
        'migrationsTsBased' => true,
        'viewsDir'          => root_path('templates/'),
        'cacheDir'          => root_path('var/cache/'),
        'baseUri'           => env('APP_BASE_URI'),
        'publicUrl'         => env('APP_PUBLIC_URL'),
        'sessionDir'        => root_path('var/cache/session/'),
        'appSecretKey'      => env('APP_SECRET')
    ],
    'logger'      => [
        'name'     => 'file',
        'adapters' => [
            'main'  => [
                'adapter' => 'stream',
                'name'    => root_path('var/logs/main.log'),
                'options' => []
            ],
        ],
    ],
];

if(env('APP_ENV') == 'dev') {
    $config['application']['logLevel'] = Logger::DEBUG;
} else {
    $config['application']['logLevel'] = Logger::ERROR;
}

return $config;
