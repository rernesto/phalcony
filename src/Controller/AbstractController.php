<?php
declare(strict_types=1);

namespace App\Controller;

use Phalcon\Config\ConfigInterface;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Psr\Log\LoggerInterface;

/**
 * @property LoggerInterface $logger
 * @property ConfigInterface $config
 */
abstract class AbstractController extends Controller
{

    public function initialize()
    {

    }

    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $this->logger->info(
            sprintf(
                'Uri mapped to %s::%s',
                get_class($dispatcher->getActiveController()),
                $dispatcher->getActiveMethod()
            )
        );
    }

    public function afterExecuteRoute(Dispatcher $dispatcher)
    {

    }
}
