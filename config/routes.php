<?php
declare(strict_types=1);

use Phalcon\Mvc\Router;

$defaultNamespace = 'App\\Controller';

$defaultGroup = new Router\Group();
$defaultGroup->setPrefix('/');

$apiDefaultNamespace = 'App\\Controller\\Api';

$apiDefaultGroup = new Router\Group();
$apiDefaultGroup->setPrefix('/api');