<?php
declare(strict_types=1);

use App\Kernel;
use Phalcon\Di;
use Phalcon\Di\DiInterface;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));

/**
 * Call Dependency Injection container
 *
 * @return mixed|null|DiInterface
 */
function container()
{
    $default = Di::getDefault();
    $args    = func_get_args();
    if (empty($args)) {
        return $default;
    }

    return call_user_func_array([$default, 'get'], $args);
}

/**
 * Get projects relative root path
 *
 * @param string $prefix
 *
 * @return string
 */
function root_path(string $prefix = ''): string
{
    /** @var Kernel $application */
    $application = container(Kernel::APPLICATION_PROVIDER);

    return join(
        DIRECTORY_SEPARATOR,
        [$application->getRootPath(), ltrim($prefix, DIRECTORY_SEPARATOR)]
    );
}

/**
 * @param string $varName
 * @return mixed
 */
function env(string $varName)
{
    if(isset($_SERVER[$varName])) {
        return $_SERVER[$varName];
    }
    return null;
}

try {
    require_once BASE_PATH . '/vendor/autoload.php';

    Dotenv\Dotenv::createMutable(BASE_PATH)->load();
    $application = (new Kernel(BASE_PATH))->run();

} catch (\Exception $e) {
    echo $e->getMessage(), '<br>';
    echo nl2br(htmlentities($e->getTraceAsString()));
}
