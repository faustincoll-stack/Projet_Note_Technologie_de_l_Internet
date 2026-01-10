document.addEventListener("DOMContentLoaded", () => {

    const dataDiv = document.getElementById("matchup-data");

    if (!dataDiv) {
        console.error("Div matchup-data introuvable !");
        return;
    }

    const currentChampion = dataDiv.dataset.champion;
    const currentMatchup = dataDiv.dataset.matchup;

    console.log("Champion :", currentChampion);
    console.log("Matchup :", currentMatchup);

    if (!currentChampion || !currentMatchup) {
        console.warn("Champion ou matchup manquant !");
        return;
    }

    fetch("api/get_matchup.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            champion: currentChampion,
            matchup: currentMatchup
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            showMissingMatchup();
            return;
        }
        displayMatchup(data);
    })
    .catch(err => console.error("Erreur fetch :", err));
});
