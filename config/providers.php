<?php
declare(strict_types=1);

use App\Provider\ConfigProvider;
use App\Provider\DatabaseProvider;
use App\Provider\LoggerProvider;
use App\Provider\RouterProvider;
use App\Provider\SessionBagProvider;
use App\Provider\SessionProvider;
use App\Provider\UrlProvider;
use App\Provider\ViewProvider;

return [
    ConfigProvider::class,
    RouterProvider::class,
    ViewProvider::class,
    DatabaseProvider::class,
    SessionProvider::class,
    SessionBagProvider::class,
    UrlProvider::class,
    LoggerProvider::class
];