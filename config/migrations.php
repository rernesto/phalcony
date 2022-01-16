<?php
include dirname(__DIR__) . '/vendor/autoload.php';

use Phalcon\Config;
Dotenv\Dotenv::createMutable(dirname(__DIR__))->load();

return new Config([
    'database'    => [
        'adapter'  => env('DB_ADAPTER'),
        'host'     => env('DB_HOST'),
        'port'     => env('DB_PORT'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'dbname'   => env('DB_NAME'),
    ],
    'application' => [
        'logInDb' => true,
        'no-auto-increment' => false,
        'skip-ref-schema' => true,
        'skip-foreign-checks' => true,
        'migrationsDir'     => dirname(__DIR__) . DIRECTORY_SEPARATOR .'migrations/',
        'migrationsTsBased' => true, // true - Use TIMESTAMP as version name, false - use versions
        'exportDataFromTables' => [
            // Tables names
            // Attention! It will export data every new migration
        ],
    ],
]);