const champions = ["Darius", "Fiora", "Garen", "Ornn", "Renekton"]; // Liste des champions top
const input = document.getElementById('champion-input');
const list = document.getElementById('champion-list');

input.addEventListener('input', () => {
    const value = input.value.toLowerCase();
    list.innerHTML = '';

    if(value === '') return;

    const filtered = champions.filter(champ => champ.toLowerCase().includes(value));

    filtered.forEach(champ => {
        const li = document.createElement('li');
        li.textContent = champ;
        li.addEventListener('click', () => {
            input.value = champ; // Remplir le champ
            list.innerHTML = ''; // Fermer la liste
        });
        list.appendChild(li);
    });
});

document.addEventListener('click', (e) => {
    if(!input.contains(e.target) && !list.contains(e.target)){
        list.innerHTML = '';
    }
});
