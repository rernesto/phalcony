<?php
declare(strict_types=1);

namespace App\Controller;

use Phalcon\Mvc\Controller;
use Psr\Log\LoggerInterface;

/**
 * @property LoggerInterface logger
 */
abstract class AbstractController extends Controller
{

    public function onConstruct()
    {
        $this->logger->info(
            sprintf(
                'Controller %s initialized',
                get_class($this)
            )
        );
    }
}
