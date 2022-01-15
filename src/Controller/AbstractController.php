<?php
declare(strict_types=1);

namespace App\Controller;

use Phalcon\Config\ConfigInterface;
use Phalcon\Crypt\CryptInterface;
use Phalcon\Db\Adapter\Pdo\AbstractPdo;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\RouterInterface;
use Phalcon\Session\ManagerInterface as SessionManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * @property LoggerInterface $logger
 * @property ConfigInterface $config
 * @property AbstractPdo $db
 * @property RouterInterface $router
 * @property SessionManagerInterface $session
 * @property CryptInterface $crypt
 */
abstract class AbstractController extends Controller
{

    public function onConstruct()
    {
        $this->logger->info(
            sprintf(
                'Controller `%s` initialized',
                get_called_class()
            )
        );
    }
}
