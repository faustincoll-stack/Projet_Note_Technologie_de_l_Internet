<?php
// -------------------------------
// get_matchup.php
// API qui récupère les données d'un matchup depuis la base de données
// -------------------------------

// En-tête pour JSON
// Indique au navigateur que la réponse sera au format JSON
header('Content-Type: application/json');

// Inclut la connexion à la base
// Charge le fichier db.php qui contient la variable $conn (connexion PDO)
require 'db.php';

// Récupère les données envoyées depuis JS
// file_get_contents('php://input') lit le corps brut de la requête HTTP
// json_decode() convertit le JSON en tableau PHP associatif
// true en 2ème paramètre force le retour en tableau (pas en objet)
$input = json_decode(file_get_contents('php://input'), true);

// Récupère le nom du champion joué et supprime les espaces
// ?? '' fournit une chaîne vide par défaut si la clé n'existe pas
$championFrom = trim($input['champion'] ?? '');
// Récupère le nom du champion adverse et supprime les espaces
$championTo   = trim($input['matchup'] ?? '');

// Vérifie que les valeurs existent
// Si l'un des deux champions est vide
if (!$championFrom || !$championTo) {
    // Renvoie une réponse JSON avec une erreur
    echo json_encode(['error' => true, 'message' => 'Champion ou matchup manquant.']);
    // Arrête l'exécution du script
    exit;
}

// Bloc try : tente d'exécuter le code, capture les erreurs éventuelles
try {
    // Prépare la requête pour récupérer le matchup
    // Sélectionne toutes les colonnes de la table matchup_texts
    $stmt = $conn->prepare("
        SELECT *
        FROM matchup_texts
        WHERE champion_from = :champion_from
          AND champion_to = :champion_to
        LIMIT 1
    ");

    // Exécute la requête avec les noms des champions
    // Les paramètres nommés (:champion_from, :champion_to) sont remplacés
    $stmt->execute([
        ':champion_from' => $championFrom,
        ':champion_to'   => $championTo
    ]);

    // Récupère le résultat sous forme de tableau associatif
    // fetch() récupère UNE seule ligne (la première trouvée)
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si aucun matchup trouvé
    // Si $row est false (aucune ligne retournée)
    if (!$row) {
        // Renvoie une erreur JSON simple
        echo json_encode(['error' => true]);
        // Arrête l'exécution
        exit;
    }

    // Structure la réponse pour ton JS
    // Crée un tableau associatif avec les données du matchup
    // Les clés correspondent aux colonnes de la BDD
    $response = [
        'presentation'       => $row['presentation'],           // Section 1
        'conditions_victoire'=> $row['win_conditions'],         // Section 2
        'early_game'         => $row['early_game'],             // Section 3
        'mid_game'           => $row['mid_game'],               // Section 4
        'late_game'          => $row['late_game'],              // Section 5
        'conseils'           => $row['gameplay_tips'],          // Section 6
        'runes_objets'       => $row['runes_items'],            // Section 7
        'resume'             => $row['summary']                 // Section 8
    ];

    // Convertit le tableau PHP en JSON et l'envoie au client
    echo json_encode($response);
    // Arrête l'exécution
    exit;

// Bloc catch : capture les exceptions PDO si une erreur survient
} catch (PDOException $e) {
    // Erreur côté serveur
    // Renvoie une erreur JSON avec le message d'exception
    echo json_encode(['error' => true, 'message' => 'Erreur DB : ' . $e->getMessage()]);
    // Arrête l'exécution
    exit;
}