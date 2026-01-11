document.addEventListener("DOMContentLoaded", () => {

    const champions = [
        "Aatrox", "Ahri", "Akali", "Camille", "Darius", "Fiora",
        "Garen", "Irelia", "Jax", "Kennen", "Malphite",
        "Nasus", "Ornn", "Renekton", "Riven",
        "Sett", "Shen", "Teemo", "Warwick", "Yone"
        // 👉 ajoute toute ta liste ici
    ];

    function setupAutocomplete(inputId, listId) {
        const input = document.getElementById(inputId);
        const list = document.getElementById(listId);
        const form = input.closest("form");
        let currentIndex = -1;

        if (!input || !list) return;

        /* ====== INPUT ====== */
        input.addEventListener("input", () => {
            const value = input.value.toLowerCase();
            list.innerHTML = "";
            currentIndex = -1;

            if (!value) return;

            const filtered = champions.filter(champ =>
                champ.toLowerCase().startsWith(value)
            );

            filtered.forEach(champ => {
                const li = document.createElement("li");
                li.textContent = champ;

                li.addEventListener("click", () => {
                    input.value = champ;
                    list.innerHTML = "";
                    form.submit();
                });

                list.appendChild(li);
            });
        });

        /* ====== CLAVIER ====== */
        input.addEventListener("keydown", e => {
            const items = list.querySelectorAll("li");

            if (!items.length) return;

            if (e.key === "ArrowDown") {
                e.preventDefault();
                currentIndex = (currentIndex + 1) % items.length;
            }

            if (e.key === "ArrowUp") {
                e.preventDefault();
                currentIndex = (currentIndex - 1 + items.length) % items.length;
            }

            if (e.key === "Enter") {
                if (currentIndex >= 0) {
                    e.preventDefault();
                    input.value = items[currentIndex].textContent;
                    list.innerHTML = "";
                    form.submit();
                }
            }

            items.forEach((item, index) => {
                item.classList.toggle("active", index === currentIndex);
            });
        });

        /* ====== CLICK OUTSIDE ====== */
        document.addEventListener("click", e => {
            if (!input.contains(e.target) && !list.contains(e.target)) {
                list.innerHTML = "";
            }
        });
    }

    /* ====== INITIALISATION ====== */
    setupAutocomplete("champion-input", "champion-list");
    setupAutocomplete("matchup-input", "matchup-list");

});
