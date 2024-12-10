<?php
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UtilisateurController;

$router = new Router();

// Charger les routes à partir des annotations des controllers

$router->loadRoutesFromAnnotations([
    HomeController::class,
    UtilisateurController::class,
]);

return $router;
?>