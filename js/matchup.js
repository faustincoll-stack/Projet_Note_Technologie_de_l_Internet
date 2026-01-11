// -------------------------------
// matchup.js
// Gère l'affichage des matchups entre champions
// -------------------------------


// Attend que tout le HTML soit chargé avant d'exécuter le code
document.addEventListener('DOMContentLoaded', () => {
// Récupère l'élément input pour le champion joué
const championInput = document.getElementById('champion-input');
// Récupère l'élément input pour le champion adverse
const matchupInput = document.getElementById('matchup-input');
// Récupère le conteneur où afficher les résultats du matchup
const matchupContainer = document.getElementById('matchups');

// Vérifie que tous les éléments HTML existent bien
if (!championInput || !matchupInput || !matchupContainer) {
    // Affiche une erreur dans la console si un élément manque
    //console.error("Éléments DOM manquants : vérifiez les IDs dans le HTML.");
}

// Récupère le formulaire de sélection des champions
const form = document.querySelector('.champion-form');
// Écoute la soumission du formulaire
form.addEventListener('submit', function(e) {
    // Empêche le rechargement de la page (comportement par défaut)
    e.preventDefault();
    // Affiche dans la console les valeurs sélectionnées (pour debug)
    //console.log('Champion:', champion, 'Matchup:', matchup);
    // Lance la récupération des données du matchup
    fetchMatchup(championInput.value, matchupInput.value);
});

// Fonction qui affiche un message d'erreur si le matchup n'existe pas
function showMissingMatchup(){
    // Remplace le contenu du container par un message d'erreur
    matchupContainer.innerHTML = '<p class="matchup-error">Aucun matchup disponible pour cette combinaison.</p>';
}

// Fonction principale qui affiche les détails du matchup sur la page
// data : objet JSON contenant toutes les informations du matchup
function displayMatchup(data) {
    // Récupère le conteneur d'affichage
    const matchupContainer = document.getElementById('matchups');
    // Vide complètement le contenu précédent
    matchupContainer.innerHTML = '';

    // Si aucune donnée n'est reçue ou si une erreur est présente
    if (!data || data.error) {
       
        // Affiche le message d'erreur
        showMissingMatchup()
        // Arrête l'exécution de la fonction
        return;
    }

    // Vide à nouveau le container (sécurité)
    matchupContainer.innerHTML = '';

    // Définit la structure des 8 sections du matchup
    // Chaque section a un titre et récupère son contenu depuis data
    const sections = [
        { title: '1. Présentation du matchup', content: data.presentation },
        { title: '2. Conditions de victoire', content: data.conditions_victoire },
        { title: '3. Early game (niveaux 1-5)', content: data.early_game },
        { title: '4. Mid game (niveau 6+)', content: data.mid_game },
        { title: '5. Late game', content: data.late_game },
        { title: '6. Conseils de gameplay', content: data.conseils },
        { title: '7. Runes & objets recommandés', content: data.runes_objets },
        { title: '8. Résumé rapide', content: data.resume }
    ];

    // Pour chaque section définie ci-dessus
    sections.forEach(section => {
        // Crée une div pour contenir la section
        const sectionDiv = document.createElement('div');
        // Ajoute la classe CSS "matchup-section"
        sectionDiv.classList.add('matchup-section');

        // Crée un titre <h3>
        const title = document.createElement('h3');
        // Met le titre de la section dans le <h3>
        title.textContent = section.title;

        // Crée un paragraphe <p> pour le contenu
        const content = document.createElement('p');
        // Met le contenu ou un message par défaut si vide
        content.textContent = section.content || '— Aucun contenu disponible —';

        // Ajoute le titre dans la div de section
        sectionDiv.appendChild(title);
        // Ajoute le contenu dans la div de section
        sectionDiv.appendChild(content);
        // Ajoute la section complète dans le container principal
        matchupContainer.appendChild(sectionDiv);
    });
}

// Fonction qui récupère les données du matchup depuis le serveur
function fetchMatchup() {
    // Récupère la valeur du champion joué et supprime les espaces
    const champion = championInput.value.trim();
    // Récupère la valeur du champion adverse et supprime les espaces
    const matchup = matchupInput.value.trim();

    // Si l'un des deux champs est vide
    if (!champion || !matchup) {
        // Affiche un message demandant de remplir les champs
        matchupContainer.innerHTML = '<p class="matchup-error">Veuillez sélectionner un champion et un matchup.</p>';
        // Arrête l'exécution
        return;
    }

    // Envoie une requête POST vers l'API PHP
    fetch('api/get_matchup.php', {
        // Méthode HTTP utilisée
        method: 'POST',
        // Définit le type de contenu (JSON)
        headers: { 'Content-Type': 'application/json' },
        // Convertit les données en JSON et les envoie
        body: JSON.stringify({ champion, matchup })
    })
    // Première étape : convertit la réponse en JSON
    .then(res => res.json())
    
    // Deuxième étape : traite les données reçues
    .then(data => {
        // Affiche dans la console la réponse de l'API (pour debug)
        //console.log('Réponse API:', data);
        // Si une erreur est présente dans la réponse
        if (data.error) {
            // Affiche le message d'erreur
            showMissingMatchup();
            // Arrête l'exécution
            return;
        }
        // Si tout va bien, affiche le matchup sur la page
        displayMatchup(data);
    })
    // Capture toute erreur réseau ou de traitement
    .catch(err => {
        // Affiche l'erreur dans la console
        //console.error('Erreur lors de la récupération du matchup :', err);
        // Affiche un message d'erreur technique à l'utilisateur
        matchupContainer.innerHTML = '<p class="matchup-error">Impossible de récupérer le matchup.</p>';/*Vérifiez la console.</p>';*/
    });
}

// Au chargement de la page, vérifie si les champs sont déjà remplis
// (par exemple après un rechargement ou une soumission de formulaire)
if (championInput.value && matchupInput.value && championInput.value !== '' && matchupInput.value !== '') {
    // Si oui, charge automatiquement le matchup
    fetchMatchup();
}

// Ajoute un écouteur : quand le champion change, recharge le matchup
championInput.addEventListener('change', fetchMatchup);
// Ajoute un écouteur : quand le matchup change, recharge le matchup
matchupInput.addEventListener('change', fetchMatchup);
// Ajoute un écouteur : quand on appuie sur Entrée dans le champ champion
championInput.addEventListener('keyup', function(e) { 
    // Si la touche est Entrée
    if(e.key === 'Enter') 
        // Lance la recherche du matchup
        fetchMatchup(); 
});
// Ajoute un écouteur : quand on appuie sur Entrée dans le champ matchup
matchupInput.addEventListener('keyup', function(e) { 
    // Si la touche est Entrée
    if(e.key === 'Enter') 
        // Lance la recherche du matchup
        fetchMatchup(); 
});
});