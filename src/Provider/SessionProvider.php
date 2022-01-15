<?php
declare(strict_types=1);

namespace App\Provider;


use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Session\Adapter\Stream as SessionAdapter;
use Phalcon\Session\Manager as SessionManager;

class SessionProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected string $providerName = 'session';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        /** @var string $savePath */
        $savePath = $di->getShared('config')->path('application.sessionDir');
        $handler  = new SessionAdapter([
            'savePath' => $savePath,
        ]);

        $di->set($this->providerName, function () use ($handler) {
            $session = new SessionManager();
            $session->setAdapter($handler);
            $session->start();

            return $session;
        });
    }
}