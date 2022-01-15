<?php
declare(strict_types=1);

namespace App\Provider;

use Phalcon\Di\DiInterface;
use Phalcon\Logger\AdapterFactory;
use Phalcon\Logger\LoggerFactory;

class LoggerProvider implements \Phalcon\Di\ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'logger';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config')->get('logger');

        $di->set($this->providerName, function () use ($config) {
            $adapterFactory = new AdapterFactory();
            $loggerFactory  = new LoggerFactory($adapterFactory);

            return $loggerFactory->load($config);
        });
    }
}