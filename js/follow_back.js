document.querySelectorAll('.follow_back_btn').forEach((btn) => {
    btn.addEventListener('click', async () => {
        const follow_back = btn.dataset.follow_back;
        const [idSuiveur, idSession] = follow_back.split("_");

        try {
            const response = await fetch('../scripts/follow_back.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ idSuiveur, idSession })
            });

            if (!response.ok) throw new Error(`Erreur réseau : ${response.status} ${response.statusText}`);

            const result = await response.json();

            if (result.success) {
                btn.textContent = "Amis";
                btn.classList.add('bg-black');
                btn.classList.remove('bg-red-500');
            }
            else {

            }
        }
        catch (err) {

        }

    });
});