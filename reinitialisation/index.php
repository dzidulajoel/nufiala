<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link
        href="https://api.fontshare.com/v2/css? f[]=melodrama@500,600,700,1&f[]=satoshi@400,500,700&f[]=general-sans@500,600,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/swipe.css">
    <style>
        .titre {
            font-family: 'General Sans', sans-serif;
        }

        .sous_titre {
            font-family: 'Melodrama', serif;
        }

        .paragraphe {
            font-family: 'Satoshi', sans-serif;
        }

        .df_jcc_iac_g2 {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px
        }
    </style>


</head>

<body class="min-h-screen flex items-center justify-center bg-black/10 relative">

    <div class="absolute top-[21%] left-1/2 -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24" fill="none">
            <path d="M9 12.5L11 14.5L15 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="12" cy="12" r="9" stroke="white" stroke-width="2"/>
            </svg>
            <p class="text-sm font-medium paragraphe">Modification réussie !</p>
    </div>

    <div class="bg-white shadow-sm rounded-lg w-full max-w-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-2 titre">Réinitialisez votre mot de passe</h1>
        <p class="text-gray-500 text-center mb-8 paragraphe">Entrez votre nouveau mot de passe ci-dessous.</p>

        <form class="space-y-5 ">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nouveau mot de passe</label>
                <input type="password" placeholder="Entrez un nouveau mot de passe"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                    required />
                <p class="text-xs text-gray-500 mt-1 paragraphe">
                    Votre mot de passe doit contenir au moins 8 caractères.
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Confirmer le mot de passe</label>
                <input type="password" placeholder="Confirmez le mot de passe"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe"
                    required />
            </div>

            <button type="submit"
                class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe">
                Réinitialiser le mot de passe
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6 paragraphe">
            <a href="../connexion/" class="text-[#3396D3] font-medium hover:underline">Retour à la connexion</a>
        </p>
    </div>

</body>
</html>