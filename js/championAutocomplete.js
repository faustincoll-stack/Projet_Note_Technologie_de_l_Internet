
/*
// Liste des champions top
const champions = ["Darius", "Fiora", "Garen", "Ornn", "Renekton","Warwick"]; 
const input = document.getElementById('champion-input');
const list = document.getElementById('champion-list');
const searchBtn = document.querySelector('.search-btn');
const form = input.closest('form'); // récupère le formulaire parent

// ===== Autocomplétion au clavier =====
input.addEventListener('input', () => {
    const value = input.value.toLowerCase();
    list.innerHTML = '';

    if (value === '') return;

    const filtered = champions.filter(champ => champ.toLowerCase().includes(value));

    if(filtered.length === 0){
        const li = document.createElement('li');
        li.textContent = "Ce champion n'est pas enregistrer";
        li.style.color = "#f5d76e"; // doré
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
            form.submit(); // Soumettre le formulaire directement après clic
        });
        list.appendChild(li);
    });
});

// ===== Loupe (bouton) =====
searchBtn.addEventListener('click', (e) => {
    e.preventDefault(); // empêche le submit par défaut

    const value = input.value.trim();
    if(value === '') return;

    // Filtrer les champions correspondant
    let filtered = champions.filter(champ => champ.toLowerCase().includes(value.toLowerCase()));

    if(filtered.length === 0){
        // Aucun champion trouvé
        list.innerHTML = '';
        const li = document.createElement('li');
        li.textContent = "Ce champion n'existe pas";
        li.style.color = "#f5d76e";
        li.style.fontStyle = "italic";
        list.appendChild(li);
        return;
    }

    // Si le champion exact existe, le mettre en haut
    const exactIndex = filtered.findIndex(c => c.toLowerCase() === value.toLowerCase());
    if(exactIndex >= 0){
        const exactChamp = filtered.splice(exactIndex,1)[0];
        filtered = [exactChamp, ...filtered];
    }

    // Remplir l'input avec le premier élément (champion exact en haut) et soumettre le formulaire
    input.value = filtered[0];
    form.submit(); // <-- ça recharge la page avec POST
});

// ===== Fermer la liste quand on clique ailleurs =====
document.addEventListener('click', (e) => {
    if(!input.contains(e.target) && !list.contains(e.target) && !searchBtn.contains(e.target)){
        list.innerHTML = '';
    }
});
*/

// Liste des champions top
const champions = ["Darius", "Fiora", "Garen", "Ornn", "Renekton"]; 

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
