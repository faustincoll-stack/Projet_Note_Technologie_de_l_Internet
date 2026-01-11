//Création système asynchrone : le code continue de s'exécuter pendant que la requête est en cours. 


// Attend que tout le HTML soit chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", () => {

    // Récupère l'élément HTML avec l'id "matchup-data"
    const dataDiv = document.getElementById("matchup-data");

    // Si l'élément n'existe pas dans la page
    if (!dataDiv) {
        // Affiche une erreur dans la console du navigateur
        console.error("Div matchup-data introuvable !");
        // Arrête l'exécution de la fonction
        return;
    }

    // Récupère la valeur de l'attribut data-champion de la div
    const currentChampion = dataDiv.dataset.champion;
    // Récupère la valeur de l'attribut data-matchup de la div
    const currentMatchup = dataDiv.dataset.matchup;

    // Affiche dans la console le nom du champion sélectionné
    console.log("Champion :", currentChampion);
    // Affiche dans la console le nom du champion adverse
    console.log("Matchup :", currentMatchup);

    // Si l'un des deux champions n'est pas défini (vide ou null)
    if (!currentChampion || !currentMatchup) {
        // Affiche un avertissement dans la console
        console.warn("Champion ou matchup manquant !");
        // Arrête l'exécution
        return;
    }

    // Envoie une requête HTTP POST vers le fichier PHP
    fetch("api/get_matchup.php", {
        // Méthode HTTP utilisée (POST pour envoyer des données)
        method: "POST",
        // Définit le type de contenu envoyé (JSON)
        headers: {
            "Content-Type": "application/json"
        },
        // Convertit les données JavaScript en format JSON pour l'envoi
        body: JSON.stringify({
            champion: currentChampion,    // Nom du champion joué
            matchup: currentMatchup        // Nom du champion adverse
        })
    })
    // Quand la réponse arrive : la convertir en JSON
    .then(res => res.json())
    // Quand la conversion est terminée : traiter les données
    .then(data => {
        // Si le serveur renvoie une erreur
        if (data.error) {
            // Affiche un message indiquant que le matchup n'existe pas
            showMissingMatchup();
            // Arrête le traitement
            return;
        }
        // Si tout va bien, affiche les données du matchup sur la page
        displayMatchup(data);
    })
    // Capture toute erreur survenue pendant la requête fetch
    .catch(err => console.error("Erreur fetch :", err));
});
