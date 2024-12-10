<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'etudeclinique';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Créer la table des migrations si elle n'existe pas (si elle existe déjà, cette requête ne fait rien)
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    // Récupérer les fichiers de migration
    $migrations = glob(__DIR__ . '/../migrations/*.sql');

    // Récupérer les migrations déjà exécutées
    $executedMigrations = $pdo->query("SELECT migration FROM migrations")->fetchAll(PDO::FETCH_COLUMN);

    foreach ($migrations as $migration) {
        $migrationName = basename($migration);

        // Vérifier si la migration a déjà été exécutée
        if (!in_array($migrationName, $executedMigrations)) {
            $sql = file_get_contents($migration);
            try {
                $pdo->exec($sql);
                echo "Executed migration: $migration\n";

                // Enregistrer la migration comme exécutée
                $stmt = $pdo->prepare("INSERT INTO migrations (migration) VALUES (:migration)");
                $stmt->execute(['migration' => $migrationName]);
            } catch (PDOException $e) {
                echo "Error executing migration $migration: " . $e->getMessage() . "\n";
            }
        } else {
            echo "Migration already executed: $migration\n";
        }
    }
} catch (PDOException $e) {
    echo "Error connecting to the database: " . $e->getMessage();
}