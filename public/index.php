<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;

$db = new Database();
$conn = $db->connect(); // Connexion à la base de données

$router = require_once __DIR__ . '/../src/routes.php';

// Récupérer l'URL demandée
// parse_url() permet de récupérer le chemin de l'URL
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// dispatch() retourne la réponse générée par le contrôleur
// qui sera envoyée au navigateur
$router->dispatch($requestUri); 
?>