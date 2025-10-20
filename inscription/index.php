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

<body class="min-h-screen flex items-center justify-center bg-black/10 relative">

    <div id="msg_inscription" ></div>

    <div class="bg-white shadow-sm rounded-lg w-full max-w-md p-8">
    <h1 class="text-2xl font-bold titre text-gray-800 text-center mb-2">Rejoignez SkillSwap dès aujourd’hui</h1>
    <p class="text-gray-500 text-center paragraphe mb-8">Créez votre profil et commencez à partager et apprendre vos compétences</p>

    <form class="space-y-5" id="inscription">
      <!-- Nom -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Nom</label>
        <input id="nom" type="text" placeholder="Entrez votre nom complet" class="paragraphe w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none" required>
      </div>

      <!-- Prenom -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Prénom</label>
        <input id="prenom" type="text" placeholder="Entrez votre prénom complet" class="paragraphe w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none" required>
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Email</label>
        <input id="email" type="email" placeholder="exemple@email.com" class="paragraphe w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none" required>
      </div>

      <!-- Mot de passe -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Mot de passe</label>
        <input id="pwd" type="password" placeholder="Entrez votre mot de passe" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required />
        <p class="text-xs text-gray-500 mt-1">Votre mot de passe doit contenir au moins 8 caractères</p>
      </div>

      <!-- Confirmer mot de passe -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1 paragraphe">Confirmer le mot de passe</label>
        <input id="confPwd" type="password" placeholder="Confirmez le mot de passe" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-cyan-500 focus:outline-none paragraphe" required />
      </div>

      <!-- Conditions -->
      <div class="text-sm paragraphe">
        En vous inscrivant, vous acceptez nos 
        <a href="#" class="text-cyan-600 hover:underline">Conditions</a> et notre 
        <a href="#" class="text-cyan-600 hover:underline">Politique de confidentialité</a>.
      </div>

      <!-- CTA -->
      <button id="creer_inscription" type="submit" class="w-full cursor-pointer bg-black text-white py-2 rounded-lg font-medium hover:bg-[#3396D3] paragraphe transition">Créer mon compte</button>
    </form>

    <!-- Redirection connexion -->
    <p class="text-center text-sm text-gray-600 mt-6 paragraphe">
      Déjà membre ?
      <a href="../connexion" class="text-cyan-600 font-medium hover:underline">Connectez-vous</a>
    </p>
  </div>
  <script src="../js/inscription.js"></script>
</body>

</html>