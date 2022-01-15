<?php
declare(strict_types=1);

use App\Kernel;
use Psr\Log\LoggerInterface;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));


try {
    require_once BASE_PATH . '/vendor/autoload.php';

    Dotenv\Dotenv::createMutable(BASE_PATH)->load();
    $application = (new Kernel(BASE_PATH))->run();

} /** @noinspection PhpUndefinedClassInspection */ catch (Throwable $e) {
    /** @var LoggerInterface $logger */
    $logger = container('logger');
    $logger->error(sprintf('%s', $e->getMessage()));
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
}
