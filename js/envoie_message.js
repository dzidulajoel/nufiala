document.addEventListener("DOMContentLoaded", function () {
    const inputMessage = document.querySelector("#msg");
    const btnEnvoyer = document.querySelector("#envoie_de_message");
    const zoneDiscussion = document.querySelector(".zone_discussion");


    btnEnvoyer.addEventListener("click", async (e) => {
        e.preventDefault();

        const dataAttr = e.currentTarget.getAttribute("data-message");
        const [idSession, idSuiveur] = dataAttr.split("_");
        const message = inputMessage.value.trim();

        if (!message) return;

        try {
            const response = await fetch("../scripts/envoie_message.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idSession, idSuiveur, message })
            });

            const result = await response.json();

            if (result.success) {
                const msg = result.data;
                const messageDiv = document.createElement("div");
                messageDiv.className = "self-end bg-[#3396D3] rounded-lg px-3 py-2 max-w-xs";

                messageDiv.innerHTML = `
                        <p class="text-sm text-white">${msg.contenu}</p>
                        <p class="text-[10px] text-gray-200 mt-1">
                            ${new Date(msg.date_envoi).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}
                        </p>
                    `;

                    const dernier_messages = document.querySelectorAll('.dernier_message');
                    dernier_messages.forEach((el) => {
                        if(el.dataset.user === idSuiveur){
                            setTimeout(()=>{
                                el.textContent = '.';
                            }, 700)
                                                        setTimeout(()=>{
                                el.textContent = '..';
                            }, 1000)
                                                        setTimeout(()=>{
                                el.textContent = '...';
                            }, 1500)
                            setTimeout(()=>{
                                el.textContent = msg.contenu;
                            }, 2000)

                        }
                    });


                zoneDiscussion.appendChild(messageDiv);
                zoneDiscussion.scrollTop = zoneDiscussion.scrollHeight;
                inputMessage.value = "";

            }
             else {
                alert(result.message || "Erreur d’envoi");
            }

        } catch (err) {
            console.error("Erreur :", err);
        }

    });
});



