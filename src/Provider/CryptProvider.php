<?php
declare(strict_types=1);

namespace App\Provider;

use Phalcon\Crypt;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class CryptProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'crypt';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        /** @var string $cryptSalt */
        $cryptSalt = $di->getShared('config')
            ->path('application.appSecretKey');

        $di->set($this->providerName, function () use ($cryptSalt) {
            $crypt = new Crypt();
            $crypt->setKey($cryptSalt);

            return $crypt;
        });
    }
}