<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;


if (!isset($_SESSION['id_utilisateur'])) {
    echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
    exit;
}

$id_session = $_SESSION['id_utilisateur'];

// recuperation des informations utilisateurs:
$sql = "SELECT  *  FROM utilisateurs  WHERE id = :id";
$req = $pdo->prepare($sql);
$req->execute(array(
    ":id" => $id_session
));
$data_utilisateur = $req->fetch(PDO::FETCH_ASSOC);

$dateSQL = $data_utilisateur['created_at'];
$date = new DateTime($dateSQL);

$formatter = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::NONE,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'MMMM yyyy'
);

$nom = $data_utilisateur['nom'] ?? '';
$prenom = $data_utilisateur['prenom'] ?? '';
$nom_court = substr(trim($nom), 0, 3);
$prenom_formatte = str_replace(' ', '_', trim($prenom));
$utilisateur = trim($nom_court . $prenom_formatte);
$pseudo = $utilisateur ? '@' . strtolower($utilisateur) : '@non_renseigne';



// afficher les categories:
$domaines = [
    "Informatique & Programmation",
    "Design & Arts visuels",
    "Musique & Chant",
    "Langues & Traduction",
    "Enseignement & Formation",
    "Photographie & Vidéo",
    "Bricolage & Artisanat",
    "Cuisine & Pâtisserie",
    "Sport & Bien-être",
    "Agriculture & Jardinage",
    "Communication & Marketing",
    "Entrepreneuriat & Gestion",
    "Théâtre & Expression artistique",
    "Couture & Mode",
    "Innovation & Technologie",
    "Développement personnel",
    "Éducation & Pédagogie",
    "Électronique & Mécanique",
    "Écologie & Développement durable",
];


$stmt = $pdo->query("SELECT COUNT(*) AS total FROM Propositions");
$total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];


//LIKES
$stmt = $pdo->prepare("SELECT id_proposition FROM likes WHERE id_utilisateur = ?");
$stmt->execute([$id_session]);
$likedPosts = $stmt->fetchAll(PDO::FETCH_COLUMN);
$id_proposition = $proposition['id'];


// NOMBRE DE POST PAR CATEGORIES
$stmt = $pdo->prepare("SELECT COUNT(*) FROM Propositions WHERE categorie_proposition = ?");
$categoriesCount = [];

foreach ($domaines as $domaine) {
    $stmt->execute([$domaine]);
    $count = $stmt->fetchColumn(); // récupère le nombre
    $categoriesCount[$domaine] = $count;
}


// NOMBRE DE POST PAR NIVEAU
$niveaux = ["Débutant", "Intermédiaire", "Avancé"];
$stmt = $pdo->prepare("SELECT COUNT(*) FROM Propositions WHERE niveau_propose = ?");
$niveauCount = [];

foreach ($niveaux as $niveau) {
    $stmt->execute([$niveau]);
    $count_n = $stmt->fetchColumn(); // récupère le nombre
    $niveauCount[$niveau] = $count_n;
}


// NOMBRE DE POST PAR MODE
$modes = ["En_ligne", "Présentiel"];
$modes_afficher = ["En_ligne", "Présentiel"];
$modeCounts = [];
$stmt = $pdo->prepare("SELECT COUNT(*) FROM Propositions WHERE Mode_d_echange_proposition = ?");

foreach ($modes as $m) {
    $stmt->execute([$m]);
    $modeCounts[$m] = $stmt->fetchColumn(); // récupère le nombre pour ce mode
}


// NOMBRE DE POST PAR MOMENT
$moments = ["Matinée", "Après-midi", "Flexible", "Soirs", "Week-end"];
$momentCounts = [];
$stmt = $pdo->prepare("SELECT COUNT(*) FROM Propositions WHERE Disponibilite_proposition = ?");

foreach ($moments as $m) {
    $stmt->execute([$m]);
    $momentCounts[$m] = $stmt->fetchColumn(); // récupère le nombre pour ce moment
}

//NOMBRE D'AMIS
$stmt = $pdo->prepare("
    SELECT COUNT(*) 
    FROM abonnements 
    WHERE (id_suivi = :id_session)
       OR (id_suiveur = :id_session AND abonner_verifie = 1)
");
$stmt->execute(['id_session' => $id_session]);
$amis = (int) $stmt->fetchColumn();



//HISTORIQUE

$sql_historique = "SELECT 
    p.*,
    u.nom,
    u.prenom,
    u.avatar,
    u.email,
    u.niveau,
    u.points,
    u.note_moyenne
FROM Propositions p
JOIN utilisateurs u ON p.id_utilisateur = u.id
WHERE p.id_utilisateur = :id_utilisateur";

$stmt = $pdo->prepare($sql_historique);
$stmt->execute(['id_utilisateur' => $id_session]);
$historique = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nombre_propositions = count($historique);



// DIAGRAMME:
$id_utilisateur = $_SESSION['id_utilisateur'] ?? null;
if (!$id_utilisateur) {
    die("Utilisateur non connecté");
}
$sql = "SELECT type, COUNT(*) AS total 
        FROM Propositions 
        WHERE id_utilisateur = :id_utilisateur 
        GROUP BY type";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Structure normalisée
$result = [
    'recherche' => 0,
    'proposition' => 0
];
foreach ($rows as $r) {
    $type = strtolower($r['type']);
    $count = (int)$r['total'];
    if ($type === 'recherche') $result['recherche'] = $count;
    elseif ($type === 'proposition' || $type === 'propositions') $result['proposition'] = $count;
}

$chartData = json_encode($result);

// INVITATIONS
$sql = "
    SELECT 
        i.id,
        i.id_envoyeur,
        i.id_receveur,
        i.id_post,
        i.type,
        i.status,
        i.date_creation,
        u.nom AS nom_envoyeur,
        u.prenom AS prenom_envoyeur,
        p.Titre_de_la_competence AS titre_post,
        p.point AS points_post
    FROM Invitations i
    INNER JOIN utilisateurs u ON i.id_envoyeur = u.id
    INNER JOIN Propositions p ON i.id_post = p.id
    WHERE i.id_receveur = :id_utilisateur 
      AND i.status = :status
    ORDER BY i.date_creation DESC
";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_utilisateur', $_SESSION['id_utilisateur'] ?? null, PDO::PARAM_STR);
$stmt->bindValue(':status', 'en_attente', PDO::PARAM_STR);
$stmt->execute();
$invitations = $stmt->fetchAll(PDO::FETCH_ASSOC);


// --- Récupération combinée des notifications ---
$id_session = $_SESSION['id_utilisateur'];
$sql = "(SELECT 
    i.id AS id,
    i.id_receveur AS id_utilisateur,
    'invitation' AS type,
    i.id AS reference_id,
    CONCAT('Nouvelle invitation de ', u.prenom, ' ', u.nom) AS titre,
    u.nom,
    u.prenom,
    i.date_creation AS date,
    u.Domaine_principal AS domaine
  FROM Invitations i
  JOIN utilisateurs u ON u.id = i.id_envoyeur
  WHERE i.id_receveur = :id
)
UNION ALL
(
  SELECT 
    a.id AS id,
    a.id_suivi AS id_utilisateur,
    'abonnement' AS type,
    a.id AS reference_id,
    CONCAT(u.prenom, ' ', u.nom, ' a commencé à vous suivre') AS titre,
    u.nom,
    u.prenom,
    a.date_abonnement AS date,
    u.Domaine_principal AS domaine
  FROM abonnements a
  JOIN utilisateurs u ON u.id = a.id_suiveur
  WHERE a.id_suivi = :id  AND a.type = 'abonner'
)
UNION ALL
(
  SELECT 
    l.id_like AS id,
    p.id_utilisateur AS id_utilisateur,
    'like' AS type,
    l.id_like AS reference_id,
    CONCAT(u.prenom, ' ', u.nom, ' a aimé votre proposition') AS titre,
    u.nom,
    u.prenom,
    l.date_like AS date,
    u.Domaine_principal AS domaine
  FROM likes l
  JOIN Propositions p ON p.id = l.id_proposition
  JOIN utilisateurs u ON u.id = l.id_utilisateur
  WHERE p.id_utilisateur = :id
)
UNION ALL
(
  SELECT 
    a.id AS id,
    a.id_suivi AS id_utilisateur,
    'abonnement_retour' AS type,
    a.id AS reference_id,
    CONCAT(u.prenom, ' ', u.nom, ' vous a suivi en retour') AS titre,
    u.nom,
    u.prenom,
    a.date_abonnement AS date,
    u.Domaine_principal AS domaine
  FROM abonnements AS a
  JOIN utilisateurs AS u ON u.id = a.id_suiveur
  WHERE a.abonner_verifie = 1
    AND EXISTS (
        SELECT 1
        FROM abonnements AS b
        WHERE b.id_suiveur = a.id_suivi 
          AND b.id_suivi = a.id_suiveur
          AND b.abonner_verifie = 1
          AND b.type = 'abonner_retour'
    )
)
ORDER BY date DESC;";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id_session]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

function insererNotification($pdo, $type, $id_utilisateur, $reference_id, $titre, $contenu, $nom, $prenom){
    // Vérifier si la notification existe déjà
    $check = $pdo->prepare("SELECT COUNT(*) FROM Notifications WHERE id_utilisateur = :id_utilisateur AND type = :type AND reference_id = :reference_id");
    $check->execute([
        'id_utilisateur' => $id_utilisateur,
        'type' => $type,
        'reference_id' => $reference_id
    ]);

    if ($check->fetchColumn() == 0) {
        // Si elle n'existe pas, insérer
        $sql = "INSERT INTO Notifications 
            (id, id_utilisateur, type, reference_id, titre, contenu, lue, nom, prenom) 
            VALUES (:id,:id_utilisateur, :type, :reference_id, :titre, :contenu, 0, :nom, :prenom)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => Uuid::uuid4()->toString(),
            'id_utilisateur' => $id_utilisateur,
            'type' => $type,
            'reference_id' => $reference_id,
            'titre' => $titre,
            'contenu' => $contenu,
            'nom' => $nom,
            'prenom' => $prenom
        ]);
    }
}

foreach ($notifications as $notif) {
    if ($notif['type'] === 'invitation') {
        insererNotification(
            $pdo,
            'invitation',
            $notif['id_utilisateur'],
            $notif['reference_id'],
            'Nouvelle invitation reçue',
            "$prenom_envoyeur $nom_envoyeur vous a envoyé une invitation.",
            $notif['nom'],
            $notif['prenom']
        );
    } elseif ($notif['type'] === 'abonnement') {
        insererNotification(
            $pdo,
            'abonnement',
            $notif['id_utilisateur'],
            $notif['reference_id'],
            'Nouvel abonné',
            "$prenom_suiveur $nom_suiveur a commencé à vous suivre.",
            $notif['nom'],
            $notif['prenom']
        );
    } elseif ($notif['type'] === 'like') {
        insererNotification(
            $pdo,
            'like',
            $notif['id_utilisateur'],
            $notif['reference_id'],        // reference_id = id du like
            'Nouvelle mention J’aime',
            "$prenom_likeur $nom_likeur a aimé votre proposition.",
            $notif['nom'],
            $notif['prenom']
        );
    } elseif ($notif['type'] === 'abonnement_retour') {
        insererNotification(
            $pdo,
            'abonnement_retour',
            $notif['id_utilisateur'],       // celui qui reçoit la notif (B)
            $notif['reference_id'],         // id de l'abonnement
            'Abonnement en retour',
            "{$notif['prenom']} {$notif['nom']} vous a suivi en retour.",
            $notif['nom'],
            $notif['prenom']
        );
    }
}

// --- Récupérer toutes les notifications pour l'utilisateur ---
function timeAgo($datetime): string
{
    /* ---------- 1. Normalisation en timestamp ---------- */
    if (is_numeric($datetime)) {
        // On a déjà un timestamp
        $timestamp = (int)$datetime;
    } elseif (is_string($datetime)) {
        // Conversion depuis le format SQL (ou tout autre format reconnu par strtotime)
        $timestamp = strtotime($datetime);
        if ($timestamp === false) {
            return 'Date invalide';
        }
    } else {
        // Type non géré
        return 'Date invalide';
    }

    /* ---------- 2. Calcul de l’écart en secondes ---------- */
    $now       = time();
    $diffSec   = $now - $timestamp;

    /* ---------- 3. Gestion des dates futures ou égales ---------- */
    if ($diffSec < 0) {
        return 'Dans le futur'; // ou return 'À l’instant' si vous préférez
    }
    if ($diffSec < 60) {
        return 'À l’instant';
    }

    /* ---------- 4. Minutes ---------- */
    $diffMin = (int)floor($diffSec / 60);
    if ($diffMin < 60) {
        return "Il y a {$diffMin} min";
    }

    /* ---------- 5. Heures ---------- */
    $diffHour = (int)floor($diffSec / 3600);
    if ($diffHour < 24) {
        return "Il y a {$diffHour} h";
    }

    /* ---------- 6. Jours ---------- */
    $diffDay = (int)floor($diffSec / 86400);
    return "Il y a {$diffDay} jour" . ($diffDay > 1 ? 's' : '');
}


// Récupérer les notifications
$id_session = $_SESSION['id_utilisateur'];
$sql = "SELECT * FROM Notifications WHERE id_utilisateur = :id ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id_session]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --- Compter le nombre de notifications non lues ---
$sql_unread = "SELECT COUNT(*) FROM Notifications WHERE id_utilisateur = :id AND lue = 0";
$stmt_unread = $pdo->prepare($sql_unread);
$stmt_unread->execute(['id' => $_SESSION['id_utilisateur']]);
$nb_non_lues = $stmt_unread->fetchColumn();

// ABONNEMENT:
$sql = "SELECT 
    u.id AS id_suiveur,
    u.nom,
    u.prenom,
    u.note_moyenne,
    a1.date_abonnement,
    CASE 
        WHEN a1.id_suiveur = :id_session AND a2.id_suiveur IS NOT NULL THEN 'mutuel'
        WHEN a1.id_suiveur = :id_session THEN 'suiveur'
        ELSE 'suivi'
    END AS statut_abonnement
FROM abonnements a1
JOIN utilisateurs u ON u.id = CASE 
                                 WHEN a1.id_suiveur = :id_session THEN a1.id_suivi
                                 ELSE a1.id_suiveur
                               END
LEFT JOIN abonnements a2 
    ON a2.id_suiveur = CASE 
                           WHEN a1.id_suiveur = :id_session THEN a1.id_suivi
                           ELSE a1.id_suiveur
                       END
   AND a2.id_suivi = :id_session
WHERE a1.id_suiveur = :id_session OR a1.id_suivi = :id_session
ORDER BY a1.date_abonnement DESC
";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id_session' => $id_session]);
$abonnements = $stmt->fetchAll(PDO::FETCH_ASSOC);


// ENVOIE DE POINTS 
$id_session = $_SESSION['id_utilisateur'];
$sql = "SELECT
  i.id AS id_invitation,
  i.id_envoyeur,
  i.id_receveur,
  i.id_post,
  i.type AS invitation_type,
  i.status AS invitation_status,
  i.date_creation,
  u.nom AS utilisateur_nom,
  u.prenom AS utilisateur_prenom,
  u.Domaine_principal AS utilisateur_domaine,
  p.id AS proposition_id,
  p.Titre_de_la_competence AS proposition_titre,
  p.description_proposition AS proposition_description,
  p.point AS proposition_point,
  p.id_utilisateur AS proposition_auteur_id
FROM Invitations i
JOIN utilisateurs u 
  ON (
      (i.type = 'proposition' AND u.id = i.id_receveur)
   OR (i.type = 'recherche'   AND u.id = i.id_envoyeur)
  )
LEFT JOIN Propositions p ON p.id = i.id_post
WHERE (
        (i.id_envoyeur = :id_session AND i.type = 'proposition')
     OR (i.id_receveur = :id_session AND i.type = 'recherche')
      )
  AND i.status = 'acceptee'
ORDER BY i.date_creation DESC;

";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id_session' => $id_session]);
$invitations_point = $stmt->fetchAll(PDO::FETCH_ASSOC);


//RECUPERATIONS DES ABONNEMENTS NON SUIVI EN RETOUR
$sql = "SELECT 
    a.id_suiveur,
    a.id_suivi,
    a.abonner_verifie,
    u.nom, 
    u.prenom, 
    u.Domaine_principal 
FROM abonnements AS a
JOIN utilisateurs AS u ON u.id = a.id_suiveur
WHERE a.id_suivi = :id_session
   OR (a.id_suiveur = :id_session AND a.abonner_verifie = 1)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id_session' => $id_session]);
$abonnemt_non_suivis = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Requête SQL pour moyenne et nombre de notes
$sql = "SELECT AVG(note) AS moyenne_note, COUNT(*) AS nombre_notes
        FROM Notations
        WHERE id_receveur = :id_session";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id_session' => $id_session]);
$result = $stmt->fetch();

$moyenne = $result['moyenne_note'] ?? 0;
$nb_notes = $result['nombre_notes'] ?? 0;

// Total des points gagnés
$stmtGagne = $pdo->prepare("
    SELECT SUM(points_envoyes) AS total_gagne
    FROM Points
    WHERE id_receveur = :id_utilisateur
");
$stmtGagne->execute(['id_utilisateur' => $id_utilisateur]);
$resultGagne = $stmtGagne->fetch();
$totalGagne = $resultGagne['total_gagne'] ?? 0;

// Total des points perdus
$stmtPerdu = $pdo->prepare("
    SELECT SUM(points_envoyes) AS total_perdu
    FROM Points
    WHERE id_envoyeur = :id_utilisateur
");
$stmtPerdu->execute(['id_utilisateur' => $id_utilisateur]);
$resultPerdu = $stmtPerdu->fetch();
$totalPerdu = $resultPerdu['total_perdu'] ?? 0;



// Compte le nombre total de vues de l'utilisateur
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_vues FROM Vues WHERE id_utilisateur = :id_utilisateur");
$stmt->execute([':id_utilisateur' => $id_utilisateur]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$total_vues = $result['total_vues'] ?? 0;

// Compte le nombre total de likes de l'utilisateur
$stmt = $pdo->prepare("SELECT COUNT(*) AS total_likes FROM likes WHERE id_utilisateur = :id_utilisateur");
$stmt->execute([':id_utilisateur' => $id_utilisateur]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_likes = $result['total_likes'] ?? 0;

// Compte le nombre total d'invitations où l'utilisateur est envoyeur ou receveur
$stmt = $pdo->prepare("
    SELECT COUNT(*) AS total_invitations 
    FROM Invitations 
    WHERE id_envoyeur = :id_utilisateur OR id_receveur = :id_utilisateur
");
$stmt->execute([':id_utilisateur' => $id_utilisateur]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$total_invitations = $result['total_invitations'] ?? 0;
