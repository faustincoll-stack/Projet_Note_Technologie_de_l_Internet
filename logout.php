<?php
// Démarre la session si elle ne l'est pas déjà
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Supprime toutes les variables de session
$_SESSION = [];

// Détruit la session
session_destroy();

// Redirige vers la page d'accueil ou de login
header('Location: index.php');
exit;