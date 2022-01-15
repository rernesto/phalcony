<?php
declare(strict_types=1);

namespace App\Provider;

use App\Kernel;
use Exception;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Router;

class RouterProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'router';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $application = $di->getShared(Kernel::APPLICATION_PROVIDER);
        $basePath = $application->getRootPath();

        $di->set($this->providerName, function () use ($basePath) {
            $router = new Router();

            $routes = $basePath . '/config/routes.php';
            if (!file_exists($routes) || !is_readable($routes)) {
                throw new Exception($routes . ' file does not exist or is not readable.');
            }

            /** @noinspection PhpIncludeInspection */
            require_once $routes;

            return $router;
        });
    }
}