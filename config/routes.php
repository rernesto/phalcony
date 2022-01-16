<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;

$defaultNamespace = 'App\\Controller';

$defaultGroup = new Router\Group();
$defaultGroup->setPrefix('/');

$defaultGroup->add('/:params', [
    'namespace' => $defaultNamespace,
    'controller' => 'home',
    'action' => 'welcome',
    'params' => 1
])->setName('default');

$defaultGroup->add('/:controller/:params', [
    'namespace' => $defaultNamespace,
    'controller' => 1,
    'action' => 'welcome',
    'params' => 2
]);

$defaultGroup->add('/:controller/:action/:params', [
    'namespace' => $defaultNamespace,
    'controller' => 1,
    'action' => 2,
    'params' => 3
]);

/**
 * @var Router $router
 */
$router->mount($defaultGroup);