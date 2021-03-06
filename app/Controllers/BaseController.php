<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class BaseController
{
    protected $container;
    protected $view;

    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $container->get("view");
    }
}
