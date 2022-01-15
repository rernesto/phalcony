<?php
declare(strict_types=1);

namespace App\Provider;

use App\Kernel;
use Phalcon\Config;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'config';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $application = $di->getShared(Kernel::APPLICATION_PROVIDER);
        $basePath = $application->getRootPath();

        $di->setShared($this->providerName, function () use ($basePath) {
            return $config = include $basePath . '/config/config.php';
        });
    }
}