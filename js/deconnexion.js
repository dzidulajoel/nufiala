document.querySelectorAll(".deconnexion").forEach((btn) => {
    btn.addEventListener("click", function () {
        fetch("../config/logout.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" }
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message, true);
                    setTimeout(() => {
                        window.location.href = "../connexion";

                    }, 3000);
                } else {
                    showAlert("Erreur : " + data.message, false);
                }
            })
            .catch(err => {
                console.error(err);
                showAlert("Erreur serveur : " + err.message, false);
            });
    });
});