<?php
// Configuration de la base de donnees
$host = "mysql"; // Database host
$dbname = "velou"; // Database name
$username = "velou"; // Database username
$password = ""; // Database password

// On utilise l'extension PDO pour PHP avec les parametres de base
// En cas d'erreur on arrete toute l'execution du code php
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die($e->getMessage());
}
?>
