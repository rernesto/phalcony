<?php
declare(strict_types=1);

namespace App\Provider;


use Phalcon\Di\DiInterface;
use Phalcon\Security;

class SecurityProvider implements \Phalcon\Di\ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'security';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->set($this->providerName, function () use ($di) {
            $security = new Security();
            $security->setDI($di);

            return $security;
        });
    }
}