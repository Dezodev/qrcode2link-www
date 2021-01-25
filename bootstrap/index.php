<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . "/../vendor/autoload.php";

// Create Container
$container = new Container();

// Load settings
$settings = require __DIR__ . "/../app/settings.php";
$settings($container);

// Instantiate App
AppFactory::setContainer($container);
$app = AppFactory::create();

// Load Middlewares
$middlewares = require __DIR__ . "/../app/middlewares.php";
$middlewares($app);

// Define app routes
$app->get("/", function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world");
    return $response;
});

// Run app
$app->run();
