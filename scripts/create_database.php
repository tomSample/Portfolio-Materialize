<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'etudeclinique';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    /*configure PDO pour qu'il lance des exceptions (PDOException) 
    chaque fois qu'une erreur de base de données se produit. Cela permet de gérer 
    les erreurs de manière plus robuste et de les attraper avec des blocs try-catch*/

    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    $pdo->exec($sql);

    echo "Database '$dbName' created successfully.";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
}