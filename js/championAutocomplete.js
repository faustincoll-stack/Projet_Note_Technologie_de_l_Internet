
// Liste des champions top
const champions = ["Darius", "Fiora", "Garen", "Ornn", "Renekton","Warwick"]; 

// Champion joué
const championInput = document.getElementById('champion-input');
const championList = document.getElementById('champion-list');

// Champion affronté
const matchupInput = document.getElementById('matchup-input');
const matchupList = document.getElementById('matchup-list');

// Fonction générique pour autocomplétion
function setupAutocomplete(input, list) {
    const form = input.closest('form');

    input.addEventListener('input', () => {
        const value = input.value.toLowerCase();
        list.innerHTML = '';

        if (value === '') return;

        const filtered = champions.filter(champ => champ.toLowerCase().includes(value));

        if(filtered.length === 0){
            const li = document.createElement('li');
            li.textContent = "Ce champion n'existe pas";
            li.style.color = "#f5d76e";
            li.style.fontStyle = "italic";
            list.appendChild(li);
            return;
        }

        filtered.forEach(champ => {
            const li = document.createElement('li');
            li.textContent = champ;
            li.addEventListener('click', () => {
                input.value = champ;
                list.innerHTML = '';
                form.submit();
            });
            list.appendChild(li);
        });
    });

    // Loupe
    const btn = input.nextElementSibling; // bouton juste après l'input
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const value = input.value.trim();
        if(value === '') return;

        let filtered = champions.filter(c => c.toLowerCase().includes(value.toLowerCase()));

        if(filtered.length === 0){
            list.innerHTML = '';
            const li = document.createElement('li');
            li.textContent = "Ce champion n'existe pas";
            li.style.color = "#f5d76e";
            li.style.fontStyle = "italic";
            list.appendChild(li);
            return;
        }

        const exactIndex = filtered.findIndex(c => c.toLowerCase() === value.toLowerCase());
        if(exactIndex >= 0){
            const exactChamp = filtered.splice(exactIndex,1)[0];
            filtered = [exactChamp, ...filtered];
        }

        input.value = filtered[0];
        form.submit();
    });

    // Fermer la liste si clic ailleurs
    document.addEventListener('click', (e) => {
        if(!input.contains(e.target) && !list.contains(e.target) && !btn.contains(e.target)){
            list.innerHTML = '';
        }
    });
}

// Appliquer aux deux champs
setupAutocomplete(championInput, championList);
setupAutocomplete(matchupInput, matchupList);
