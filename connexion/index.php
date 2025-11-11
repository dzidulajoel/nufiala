<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://api.fontshare.com/v2/css? f[]=melodrama@500,600,700,1&f[]=satoshi@400,500,700&f[]=general-sans@500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/swipe.css">

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

<body class="w-full h-[100vh] flex items-center justify-center bg-black/10 relative">

    <div id="msg_inscription"></div>

    <div class="bg-white shadow-sm rounded-lg w-full max-w-md p-8">

        <h1 class="text-2xl font-bold titre text-gray-800 text-center mb-2">Bienvenue de retour !</h1>
        <p class="text-gray-500 text-center paragraphe mb-8">Connectez-vous pour continuer à échanger et apprendre</p>

        <form class="space-y-5" id="connexion_form">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Email</label>
                <input id="email" type="text" placeholder="Entrez votre nom d'utilisateur" class="paragraphe w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Mot de passe</label>
                <input id="pwd" type="password" placeholder="Entrez votre mot de passe" class= " paragraphe w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none" required>
            </div>

            <div class="text-right">
                <a href="../recuperation" class="text-sm text-[#3396D3] hover:underline paragraphe">Mot de passe oublié ?</a>
            </div>

            <button id="creer_connexion" type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] transition paragraphe"> Se connecter </button>

        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Pas encore de compte ?
            <a href="../inscription/" class="paragraphe text-[#3396D3] font-medium hover:underline">Inscrivez-vous</a>
        </p>
    
    </div>

    <script src="../js/connexion.js"></script>
</body>
</html>