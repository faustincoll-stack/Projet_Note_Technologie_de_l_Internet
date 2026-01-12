<?php
// Adresse du serveur de base de données (localhost = serveur local)
$host = "127.0.0.1";
// Nom de la base de données à utiliser
$dbname = // "Identifiant étudiant
// Nom d'utilisateur pour se connecter à la base de données
$user = // "Identifiant étudiant
// Mot de passe pour se connecter (vide par défaut en local)
$pass = // "Mot de passe étudiant

// Bloc try : tente d'exécuter le code, capture les erreurs éventuelles
try {
    // Crée une nouvelle connexion PDO (PHP Data Objects) à la base de données
    $conn = new PDO(
        // DSN (Data Source Name) : chaîne de connexion MySQL
        // Spécifie le type (mysql), l'hôte, le nom de la BDD et l'encodage UTF-8
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        // Nom d'utilisateur pour la connexion
        $user,
        // Mot de passe pour la connexion
        $pass,
        // Options PDO : tableau de configuration
        // Active le mode d'erreur par exception (lance des exceptions en cas d'erreur)
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
// Bloc catch : capture les exceptions PDO si la connexion échoue
} catch (PDOException $e) {
    // Arrête l'exécution du script et affiche le message d'erreur
    die("Erreur DB : " . $e->getMessage());
}