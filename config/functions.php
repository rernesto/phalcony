<?php
declare(strict_types=1);

use App\Kernel;
use Phalcon\Di;
use Phalcon\Di\DiInterface;

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
 * @param string|null $default
 * @return mixed
 */
function env(string $varName, ?string $default = null): ?string
{
    if(isset($_SERVER[$varName])) {
        return $_SERVER[$varName];
    } elseif(isset($_ENV[$varName])) {
        return $_ENV[$varName];
    }
    return $default;
}