<?php

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    $container = $app->getContainer();

    // Set view in Container
    $container->set("view", function () {
        return Twig::create("../app/Views", [
            //"cache" => "../var/cache/twig"
        ]);
    });

    // Add Twig-View Middleware
    $app->add(TwigMiddleware::createFromContainer($app));
};
