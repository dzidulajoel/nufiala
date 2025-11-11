const notif_button = document.querySelector('.notif_button');
const notif_info = document.querySelector('#notif_info')
notif_button.addEventListener('click', async () => {
            try {
            const response = await fetch('../scripts/notification.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({  })
            });

            if (!response.ok) throw new Error(`Erreur réseau : ${response.status} ${response.statusText}`);

            const result = await response.json();

            if (result.success) {
                notif_info.textContent = 0
            }
            else {
               //showAlert(result.message, false);
            }
        }
        catch (err) {
            //showAlertLike("Une erreur est survenue. Veuillez réessayer", false);
        }
})
