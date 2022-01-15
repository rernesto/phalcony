<?php
declare(strict_types=1);

namespace App\Provider;


use App\Listener\DispatcherListener;
use Phalcon\Di\DiInterface;
use Phalcon\Events\ManagerInterface;
use Phalcon\Mvc\Dispatcher;

class DispatcherProvider implements \Phalcon\Di\ServiceProviderInterface
{

    /**
     * @var string
     */
    protected string $providerName = 'dispatcher';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        /** @var ManagerInterface $eventsManager */
        $eventsManager = $di->get('eventsManager');

        $di->set($this->providerName, function () use ($eventsManager){
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('App\Controller');
            $dispatcher->setEventsManager($eventsManager);
            return $dispatcher;
        });
    }
}