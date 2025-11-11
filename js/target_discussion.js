document.addEventListener("DOMContentLoaded", function () {

    const links = document.querySelectorAll(".target_link");
    const main_container = document.querySelector(".main_container");
    const zoneDiscussion = document.querySelector(".zone_discussion");
    const indice = document.querySelector('.indice_counter');
    const envoie_de_message = document.querySelector('#envoie_de_message');

    let currentSession = null;
    let currentSuiveur = null;
    let pollingInterval = null;

    async function chargerMessages(idSession, idSuiveur, showLoader = true) {
        const discussionAccueil = document.querySelector('.discussion_accueil');
        if (discussionAccueil) {
            discussionAccueil.classList.add('hidden');
        }

        // Supprimer un ancien loader
        const existingLoader = main_container.querySelector(".loading");
        if (existingLoader) existingLoader.remove();

        if (showLoader) {
            const loader = document.createElement("div");
            loader.className = `absolute inset-0 bg-white flex justify-center items-center z-50 loading rounded-lg`;
            loader.innerHTML = `
                <div class="w-full flex justify-center py-6 items-center paragraphe text-black animate-pulse ">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 border-4 border-gray-300 border-t-black rounded-full animate-spin mb-3"></div>
                        <p class="text-center text-sm">Chargement de la discussion...</p>
                    </div>
                </div>
            `;
            main_container.style.position = "relative";
            main_container.appendChild(loader);
        }

        try {
            const response = await fetch("../scripts/discussion.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idSession, idSuiveur })
            });

            if (!response.ok) throw new Error(`Erreur réseau : ${response.status}`);

            const result = await response.json();

            if (result.success) {
                main_container.classList.remove("hidden");
                indice.classList.add('hidden')
                if (showLoader) {
                    setTimeout(() => {
                        const loader = main_container.querySelector(".loading");
                        if (loader) loader.remove();
                        afficherMessages(result.discussion, idSession);
                    }, 1000);
                } else {
                    afficherMessages(result.discussion, idSession);
                }

            } else {
                const loader = main_container.querySelector(".loading");
                if (loader) loader.remove();
                zoneDiscussion.innerHTML = `<p class="text-red-500 text-sm text-center">${result.message || "Aucune discussion trouvée."}</p>`;
            }

        } catch (err) {
            const loader = main_container.querySelector(".loading");
            if (loader) loader.remove();
            zoneDiscussion.innerHTML = `<p class="text-red-500 text-sm text-center">Erreur : ${err.message}</p>`;
        }
    }

    function afficherMessages(messages, idSession) {
        zoneDiscussion.innerHTML = "";
        messages.forEach(msg => {
            const isSent = msg.expediteur_id === idSession;

            const messageDiv = document.createElement("div");
            messageDiv.className = isSent
                ? "self-end bg-[#3396D3] rounded-lg px-3 py-2 max-w-xs"
                : "self-start bg-black/10 rounded-lg px-3 py-2 max-w-xs";

            messageDiv.innerHTML = `
                <p class="text-sm ${isSent ? 'text-white' : 'text-black'}">${msg.contenu}</p>
                <p class="text-[10px] ${isSent ? 'text-gray-200' : 'text-gray-500'} mt-1">
                    ${new Date(msg.date_envoi).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}
                </p>
            `;
            zoneDiscussion.appendChild(messageDiv);
        });

        zoneDiscussion.scrollTop = zoneDiscussion.scrollHeight;
    }

    links.forEach(link => {
        link.addEventListener("click", async (e) => {
            e.preventDefault();

            const href = e.currentTarget.getAttribute("href");
            const [idSession, idSuiveur] = href.split("_");

            currentSession = idSession;
            currentSuiveur = idSuiveur;

             envoie_de_message.dataset.message = `${idSession}_${idSuiveur}`;
            
            // 🧹 Stopper un ancien intervalle avant d’en lancer un nouveau
            if (pollingInterval) clearInterval(pollingInterval);

            // Charger immédiatement les messages
            await chargerMessages(idSession, idSuiveur, true);

            // 🔁 Mettre à jour toutes les 5 secondes (sans loader)
            pollingInterval = setInterval(() => {
                chargerMessages(idSession, idSuiveur, false);
            }, 5000);
        });
    });

});
