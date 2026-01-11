document.addEventListener("DOMContentLoaded", () => {

    const champions = [
        "Aatrox","Akali","Camille","Darius","Fiora","Garen","Gnar",
        "Irelia","Jax","Jayce","Kennen","Malphite","Nasus","Ornn",
        "Renekton","Riven","Sett","Shen","Teemo","Warwick",
        "Yone","Yorick"
    ];

    function setupAutocomplete(inputId, listId) {
        const input = document.getElementById(inputId);
        const list = document.getElementById(listId);

        if (!input || !list) return; // 🔒 sécurité si champ absent

        const form = input.closest("form");

        let currentIndex = -1;
        let currentResults = [];

        /* =========================
           CLAVIER
        ========================= */
        input.addEventListener("keydown", (e) => {

            if (e.key === "Enter") {
                e.preventDefault();

                // Champion sélectionné
                if (currentIndex >= 0 && currentResults[currentIndex]) {
                    input.value = currentResults[currentIndex];
                }
                // Sinon premier résultat
                else if (currentResults.length > 0) {
                    input.value = currentResults[0];
                }
                // Aucun résultat → on bloque
                else {
                    return;
                }

                resetList();
                form.submit();
            }

            if (e.key === "ArrowDown") {
                e.preventDefault();
                currentIndex = Math.min(currentIndex + 1, currentResults.length - 1);
                updateActive();
            }

            if (e.key === "ArrowUp") {
                e.preventDefault();
                currentIndex = Math.max(currentIndex - 1, 0);
                updateActive();
            }
        });

        /* =========================
           FILTRAGE
        ========================= */
        input.addEventListener("input", () => {
            const value = input.value.toLowerCase();
            resetList();

            if (!value) return;

            currentResults = champions.filter(champ =>
                champ.toLowerCase().startsWith(value)
            );

            currentResults.forEach((champ, index) => {
                const li = document.createElement("li");
                li.textContent = champ;

                li.addEventListener("click", () => {
                    input.value = champ;
                    resetList();
                    form.submit();
                });

                list.appendChild(li);
            });
        });

        /* =========================
           HELPERS
        ========================= */
        function updateActive() {
            const items = list.querySelectorAll("li");
            items.forEach(item => item.classList.remove("active"));

            if (items[currentIndex]) {
                items[currentIndex].classList.add("active");
            }
        }

        function resetList() {
            list.innerHTML = "";
            currentIndex = -1;
            currentResults = [];
        }

        /* =========================
           SÉCURITÉ FINALE
        ========================= */
        input.addEventListener("blur", () => {
            setTimeout(() => {
                if (!champions.includes(input.value)) {
                    input.value = "";
                }
                resetList();
            }, 150);
        });
    }

    /* =========================
       PREP.PHP
    ========================= */
    setupAutocomplete("champion-input", "champion-list");
    setupAutocomplete("matchup-input", "matchup-list");

    /* =========================
       DASHBOARD.PHP
    ========================= */
    setupAutocomplete("favorite-champion-input", "favorite-champion-list");

});
