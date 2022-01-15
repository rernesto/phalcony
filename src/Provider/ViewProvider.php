<?php
declare(strict_types=1);

namespace App\Provider;

use Phalcon\Config;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

class ViewProvider implements \Phalcon\Di\ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'view';

    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        /** @var Config $config */
        $config = $di->getShared('config');
        /** @var string $viewsDir */
        $viewsDir = $config->path('application.viewsDir');
        /** @var string $cacheDir */
        $cacheDir = $config->path('application.cacheDir');

        $di->setShared($this->providerName, function () use ($viewsDir, $cacheDir, $di) {
            $view = new View();
            $view->setViewsDir($viewsDir);
            $view->registerEngines(
                [
                    '.volt' => function (View $view) use ($cacheDir, $di) {
                        $volt = new VoltEngine($view, $di);
                        $volt->setOptions([
                            'path'      => $cacheDir . 'volt/',
                            'separator' => '_',
                        ]);

                        return $volt;
                    },
                    '.phtml' => PhpEngine::class
                ]
            );

            return $view;
        });
    }
}