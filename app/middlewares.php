<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    $settings = $container->get("settings");

    // Add Error Middleware
    $errorMiddleware = $app->addErrorMiddleware(
        $settings["displayErrorDetails"],
        $settings["logErrors"],
        $settings["logErrorDetails"]
    );
};
