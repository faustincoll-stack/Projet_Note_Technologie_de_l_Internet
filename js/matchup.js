// -------------------------------
// matchup.js
// -------------------------------


document.addEventListener('DOMContentLoaded', () => {
// Récupération des éléments du DOM
const championInput = document.getElementById('champion-input');
const matchupInput = document.getElementById('matchup-input');
const matchupContainer = document.getElementById('matchups');

// Vérifie que les éléments existent
if (!championInput || !matchupInput || !matchupContainer) {
    console.error("Éléments DOM manquants : vérifiez les IDs dans le HTML.");
}

const form = document.querySelector('.champion-form');
form.addEventListener('submit', function(e) {
    e.preventDefault(); // empêche le rechargement de la page
    // tu peux appeler ta fonction fetch ici si tu veux lancer l'affichage
    console.log('Champion:', champion, 'Matchup:', matchup);
    fetchMatchup(championInput.value, matchupInput.value);
});

//Afficher un message si le matchup est manquant
function showMissingMatchup(){
    matchupContainer.innerHTML = '<p class="matchup-error">Aucun matchup disponible pour cette combinaison.</p>';
}

// Fonction principale pour afficher le matchup depuis la réponse API
function displayMatchup(data) {
    const matchupContainer = document.getElementById('matchups');
    // Vide le container avant d’injecter les sections
    matchupContainer.innerHTML = '';

    // Si aucune donnée ou erreur, afficher message d'erreur
    if (!data || data.error) {
       
        //Afficher un message si le matchup est manquant
        showMissingMatchup()
        return;
    }

    // Vide le container avant de réinjecter
    matchupContainer.innerHTML = '';

    // Structure HTML des 8 sections
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

    sections.forEach(section => {
        const sectionDiv = document.createElement('div');
        sectionDiv.classList.add('matchup-section');

        const title = document.createElement('h3');
        title.textContent = section.title;

        const content = document.createElement('p');
        content.textContent = section.content || '— Aucun contenu disponible —';

        sectionDiv.appendChild(title);
        sectionDiv.appendChild(content);
        matchupContainer.appendChild(sectionDiv);
    });
}

// Fonction pour récupérer le matchup depuis l'API
function fetchMatchup() {
    const champion = championInput.value.trim();
    const matchup = matchupInput.value.trim();

    if (!champion || !matchup) {
        matchupContainer.innerHTML = '<p class="matchup-error">Veuillez sélectionner un champion et un matchup.</p>';
        return;
    }

    fetch('api/get_matchup.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ champion, matchup })
    })
    .then(res => res.json())
    
    .then(data => {
        console.log('Réponse API:', data);
        if (data.error) {
            showMissingMatchup();
            return;
        }
        displayMatchup(data);
    })
    .catch(err => {
        console.error('Erreur lors de la récupération du matchup :', err);
        matchupContainer.innerHTML = '<p class="matchup-error">Impossible de récupérer le matchup. Vérifiez la console.</p>';
    });
}

// Affiche le matchup au chargement si des valeurs existent
if (championInput.value && matchupInput.value && championInput.value !== '' && matchupInput.value !== '') {
    fetchMatchup();
}

// Ajoute des écouteurs pour mise à jour dynamique
championInput.addEventListener('change', fetchMatchup);
matchupInput.addEventListener('change', fetchMatchup);
championInput.addEventListener('keyup', function(e) { if(e.key === 'Enter') fetchMatchup(); });
matchupInput.addEventListener('keyup', function(e) { if(e.key === 'Enter') fetchMatchup(); });
});