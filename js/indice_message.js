const indice_counter = document.querySelector('.indice_counter');
const dernier_message = document.querySelector('.dernier_message');
setInterval(() => {
    const links = document.querySelectorAll(".target_link");
    links.forEach(link => {
        const dataAttr = link.getAttribute("data-link-indice");
        if (!dataAttr) return;
        
        const [idSession, idSuiveur] = dataAttr.split("_");                
        indice(idSession, idSuiveur);
    });
}, 3000);

async function indice(idSession, idSuiveur) {
    try {
        const response = await fetch('../scripts/indice_message.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idSession, idSuiveur })
        });

        const result = await response.json();
        if (result.success) {
            if(result.data > 0){
                indice_counter.classList.remove('hidden')
                indice_counter.textContent = result.data
                // dernier_message.textContent = result.last_message;
                
                
            }
        }
    } catch (err) {
        console.error("Erreur fetch :", err);
    }
}
