// Récupère le champion actuel depuis la sélection
const championSelect = document.getElementById('champion');
const matchupContainer = document.getElementById('matchups');

function displayMatchups(champion) {
    matchupContainer.innerHTML = ''; // Vide le container

    if(!champion || !topMatchups[champion]) {
        matchupContainer.innerHTML = '<p>Sélectionnez un champion pour voir les matchups.</p>';
        return;
    }

    topMatchups[champion].forEach(match => {
        const div = document.createElement('div');
        div.classList.add('matchup');
        div.innerHTML = `
            <h3>${match.enemy}</h3>
            <p>Difficulté : ${match.difficulty}</p>
            <p>Conseil : ${match.advice}</p>
        `;
        matchupContainer.appendChild(div);
    });
}

// Affiche au chargement
displayMatchups(championSelect.value);

// Affiche à chaque changement de sélection
championSelect.addEventListener('change', () => {
    displayMatchups(championSelect.value);
});
