// Attend que tout le HTML soit chargé avant d'exécuter le code
document.addEventListener("DOMContentLoaded", () => {

    // Liste de tous les champions disponibles dans le jeu
    const champions = [
        "Aatrox","Akali","Camille","Darius","Fiora","Garen","Gnar",
        "Irelia","Jax","Jayce","Kennen","Malphite","Nasus","Ornn",
        "Renekton","Riven","Sett","Shen","Teemo","Warwick",
        "Yone","Yorick"
    ];

    // Fonction qui configure l'autocomplétion pour un champ de saisie
    // inputId : l'id du champ de texte
    // listId : l'id de la liste de suggestions
    function setupAutocomplete(inputId, listId) {
        // Récupère l'élément input (champ de saisie)
        const input = document.getElementById(inputId);
        // Récupère l'élément ul (liste de suggestions)
        const list = document.getElementById(listId);

        // Si l'un des deux éléments n'existe pas, arrête la fonction
        if (!input || !list) return; // 🔒 sécurité si champ absent

        // Trouve le formulaire parent du champ input
        const form = input.closest("form");

        // Index du champion actuellement sélectionné dans la liste (-1 = aucun)
        let currentIndex = -1;
        // Tableau des résultats filtrés affichés dans la liste
        let currentResults = [];

        /* =========================
           CLAVIER
        ========================= */
        // Écoute les touches du clavier quand on est dans le champ
        input.addEventListener("keydown", (e) => {

            // Si la touche Entrée est pressée
            if (e.key === "Enter") {
                // Empêche le comportement par défaut (soumission immédiate du formulaire)
                e.preventDefault();

                // Si un champion est sélectionné avec les flèches
                if (currentIndex >= 0 && currentResults[currentIndex]) {
                    // Remplit le champ avec le champion sélectionné
                    input.value = currentResults[currentIndex];
                }
                // Sinon, s'il y a des résultats disponibles
                else if (currentResults.length > 0) {
                    // Prend automatiquement le premier résultat
                    input.value = currentResults[0];
                }
                // Si aucun résultat n'est trouvé
                else {
                    // Arrête l'exécution (ne soumet pas le formulaire)
                    return;
                }

                // Vide la liste de suggestions et réinitialise les variables
                resetList();
                // Soumet le formulaire
                form.submit();
            }

            // Si la flèche bas est pressée
            if (e.key === "ArrowDown") {
                // Empêche le scroll de la page
                e.preventDefault();
                // Descend d'un cran dans la liste (sans dépasser la fin)
                currentIndex = Math.min(currentIndex + 1, currentResults.length - 1);
                // Met à jour l'affichage visuel de la sélection
                updateActive();
            }

            // Si la flèche haut est pressée
            if (e.key === "ArrowUp") {
                // Empêche le scroll de la page
                e.preventDefault();
                // Remonte d'un cran dans la liste (sans aller en dessous de 0)
                currentIndex = Math.max(currentIndex - 1, 0);
                // Met à jour l'affichage visuel de la sélection
                updateActive();
            }
        });

        /* =========================
           FILTRAGE
        ========================= */
        // Écoute chaque fois que l'utilisateur tape dans le champ
        input.addEventListener("input", () => {
            // Récupère ce qui est tapé et le met en minuscules
            const value = input.value.toLowerCase();
            // Vide la liste précédente
            resetList();

            // Si le champ est vide, ne fait rien
            if (!value) return;

            // Filtre les champions dont le nom commence par ce qui est tapé
            currentResults = champions.filter(champ =>
                champ.toLowerCase().startsWith(value)
            );

            // Pour chaque champion trouvé
            currentResults.forEach((champ, index) => {
                // Crée un élément de liste <li>
                const li = document.createElement("li");
                // Met le nom du champion dans le <li>
                li.textContent = champ;

                // Quand on clique sur un champion de la liste
                li.addEventListener("click", () => {
                    // Remplit le champ avec le nom du champion
                    input.value = champ;
                    // Vide la liste
                    resetList();
                    // Soumet le formulaire
                    form.submit();
                });

                // Ajoute le <li> à la liste <ul>
                list.appendChild(li);
            });
        });

        /* =========================
           HELPERS (fonctions utilitaires)
        ========================= */
        // Met à jour visuellement quel élément est sélectionné
        function updateActive() {
            // Récupère tous les <li> de la liste
            const items = list.querySelectorAll("li");
            // Supprime la classe "active" de tous les éléments
            items.forEach(item => item.classList.remove("active"));

            // Si un élément est sélectionné
            if (items[currentIndex]) {
                // Ajoute la classe "active" à cet élément (pour le CSS)
                items[currentIndex].classList.add("active");
            }
        }

        // Réinitialise complètement la liste de suggestions
        function resetList() {
            // Vide le contenu HTML de la liste
            list.innerHTML = "";
            // Réinitialise l'index de sélection
            currentIndex = -1;
            // Vide le tableau des résultats
            currentResults = [];
        }

        /* =========================
           SÉCURITÉ FINALE
        ========================= */
        // Quand l'utilisateur quitte le champ (clique ailleurs)
        input.addEventListener("blur", () => {
            // Attend 150ms avant d'agir (pour laisser le temps au clic sur la liste)
            setTimeout(() => {
                // Si le texte tapé ne correspond à aucun champion valide
                if (!champions.includes(input.value)) {
                    // Vide le champ
                    input.value = "";
                }
                // Vide la liste de suggestions
                resetList();
            }, 150);
        });
    }

    /* =========================
       PREP.PHP
       Active l'autocomplétion pour les deux champs de prep.php
    ========================= */
    // Configure l'autocomplétion pour le champ "Champion joué"
    setupAutocomplete("champion-input", "champion-list");
    // Configure l'autocomplétion pour le champ "Champion affronté"
    setupAutocomplete("matchup-input", "matchup-list");

    /* =========================
       DASHBOARD.PHP
       Active l'autocomplétion pour le champ du dashboard
    ========================= */
    // Configure l'autocomplétion pour le champ "Champion favori"
    setupAutocomplete("favorite-champion-input", "favorite-champion-list");

});