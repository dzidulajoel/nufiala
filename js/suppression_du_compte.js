const btnSupprimer = document.querySelector('#supprimer_le_compte');

btnSupprimer.addEventListener('click', async () => {
    const utilisateurId = btnSupprimer.getAttribute('data-id_utilisateur');
    
    try {
        const response = await fetch('../scripts/parametre.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

    if (!response.ok) {
        throw new Error(`Erreur de réseau : ${response.status} ${response.statusText}`);
    }
    const result = await response.json();
    if (result.success) {

        console.log(result.data);
        console.log(result.message);
        console.log(result.id);

        showAlert(result.message, true);


    } else {
        showAlert(result.message, false);
    }
    }
    catch (err) {
        showAlert("Une erreur est survenue. Veuillez réessayer", false);
}

});
