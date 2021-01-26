<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

require __DIR__ . "/../vendor/autoload.php";

// Create Container
$container = new Container();

// Load settings
$settings = require __DIR__ . "/../app/settings.php";
$settings($container);

// Instantiate App
$app = SlimAppFactory::create($container);

// Load Dependencies
$dependencies = require __DIR__ . "/../app/dependencies.php";
$dependencies($app);

// Load Middlewares
$middlewares = require __DIR__ . "/../app/middlewares.php";
$middlewares($app);

// Define app routes
$routes = require __DIR__ . "/../app/routes.php";
$routes($app);

// Run app
$app->run();
