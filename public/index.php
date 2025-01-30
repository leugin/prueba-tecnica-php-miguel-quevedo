<?php

use Leugin\TestDovfac\Infrastructure\Controllers\UserController;
use Leugin\TestDovfac\Infrastructure\middleware\JsonBodyParserMiddleware;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

AppFactory::setContainer((new \Leugin\TestDovfac\App())->getContainer());
$app = AppFactory::create();

$app->addRoutingMiddleware(); // Add this line
$app->addMiddleware(new JsonBodyParserMiddleware());

$app->addErrorMiddleware(true, true, true);

$basePath = str_replace('/' . basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$app->setBasePath($basePath);


$app->post('/', [UserController::class, 'create'] );
$app->put('/{userId}', [UserController::class, 'update'] );

$app->run();
