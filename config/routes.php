<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;

$defaultNamespace = 'App\\Controller';

/**
 * @var Router $router
 */
$router->add('/:params', [
    'namespace' => $defaultNamespace,
    'controller' => 'home',
    'action' => 'welcome',
    'params' => 1
])->setName('default');

$router->add('/:controller/:params', [
    'namespace' => $defaultNamespace,
    'controller' => 1,
    'action' => 'welcome',
    'params' => 2
]);

$router->add('/:controller/:action/:params', [
    'namespace' => $defaultNamespace,
    'controller' => 1,
    'action' => 2,
    'params' => 3
]);