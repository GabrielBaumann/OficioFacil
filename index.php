<?php

ob_start();

require __DIR__ . "/vendor/autoload.php";

// INICIAR

use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->get("/", "Web:login");
$route->post("/", "Web:login");




// ROUTER
$route->dispatch();

ob_end_flush();