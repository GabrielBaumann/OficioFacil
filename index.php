<?php

ob_start();

require __DIR__ . "/vendor/autoload.php";

// INICIAR

use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->get("/", "Web:login");
$route->post("/", "Web:login");

$route->get("/of", "App:oficio");
$route->post("/of", "App:oficio");
$route->get("/render/{local}", "App:atualizar");

$route->get("/gerar/{id}", "App:gerarpdf");

$route->get("/sair", "App:fechar");

// User
$route->get("/user", "App:user");
$route->get("/addUser" , "App:modalUser");
$route->get("/addUser/{idUser}" , "App:modalUser");
$route->post("/addUser" , "App:modalUser");
$route->post("/addUser/{idUser}" , "App:modalUser");



// ROUTER
$route->dispatch();

ob_end_flush();