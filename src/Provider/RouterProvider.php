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
        $routerProvider = $this;

        $di->set($this->providerName, function () use ($basePath, $routerProvider) {
            $router = new Router();

            $routes = $basePath . '/config/routes.php';
            if (!file_exists($routes) || !is_readable($routes)) {
                throw new Exception($routes . ' file does not exist or is not readable.');
            }

            /** @noinspection PhpIncludeInspection */
            require_once $routes;

            if (isset($defaultGroup) && isset($defaultNamespace)) {
                $routerProvider->mountDefaultRoutes($router, $defaultGroup, $defaultNamespace);
            }

            return $router;
        });
    }

    protected function mountDefaultRoutes(Router $router, Router\Group $defaultGroup, string $defaultNamespace) {
        $defaultGroup->add('/:params', [
            'namespace' => $defaultNamespace,
            'controller' => 'home',
            'action' => 'welcome',
            'params' => 1
        ])->setName('default');

        $defaultGroup->add('/:controller/:params', [
            'namespace' => $defaultNamespace,
            'controller' => 1,
            'action' => 'welcome',
            'params' => 2
        ]);

        $defaultGroup->add('/:controller/:action/:params', [
            'namespace' => $defaultNamespace,
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ]);
        $router->mount($defaultGroup);
    }
}