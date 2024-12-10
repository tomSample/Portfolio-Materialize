<?php
namespace App\Models;

use PDO;

class Utilisateur extends Model {

    // Exemple de méthode (requête SQL) pour obtenir des données
    public function getUsers() {
        $stmt = $this->db->query("SELECT * FROM etudeclinique.utilisateur");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}