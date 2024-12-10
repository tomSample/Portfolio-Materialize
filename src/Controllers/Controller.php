<?php
namespace App\Controllers;

class Controller {
    public function render($view, $data = []) {
        extract($data);
        $view = __DIR__ . '/../Views/' . $view . '.php';
        require_once __DIR__ . '/../Views/template.php';
    }
}