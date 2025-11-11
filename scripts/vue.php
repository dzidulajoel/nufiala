<?php
session_start();
require_once('../config/cnx.php');
require_once('../vendor/autoload.php');

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    // Vérifie que l'utilisateur est connecté
    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    $id_utilisateur = $_SESSION['id_utilisateur'];

    // Récupère les données envoyées via fetch
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id_proposition = $data['vueId'] ?? null;
    if (!$id_proposition) {
        echo json_encode(['success' => false, 'message' => 'Aucune proposition spécifiée.']);
        exit;
    }

    // Récupère l'ID du créateur de la proposition
    $stmt = $pdo->prepare("SELECT id_utilisateur FROM Propositions WHERE id = :id_proposition");
    $stmt->execute([':id_proposition' => $id_proposition]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Proposition introuvable.']);
        exit;
    }

    $id_createur = $result['id_utilisateur'];

    // Génère un UUID pour la vue
    $id_vue = Uuid::uuid4()->toString();

    // Prépare l'insertion dans la table Vues
    $stmt = $pdo->prepare("
        INSERT INTO Vues (id_vue, id_utilisateur, id_proposition, id_createur, date_vue)
        VALUES (:id_vue, :id_utilisateur, :id_proposition, :id_createur, NOW())
    ");

    $stmt->execute([
        ':id_vue' => $id_vue,
        ':id_utilisateur' => $id_utilisateur,
        ':id_proposition' => $id_proposition,
        ':id_createur' => $id_createur
    ]);
    

    // Préparer la requête pour récupérer l'offre et les infos utilisateur
    $sql = "SELECT 
        p.*,
        u.nom,
        u.prenom,
        u.avatar,
        u.email,
        u.niveau,
        u.points,
        u.note_moyenne,
        u.sexe,
        u.telephone,
        u.bio,
        u.Competences_principales,
        u.Domaine_principal,
        u.localisation
    FROM Propositions p
    JOIN utilisateurs u ON p.id_utilisateur = u.id
    WHERE p.id = :id
    LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id_proposition]);

    $proposition = $stmt->fetch(PDO::FETCH_ASSOC);


    echo json_encode(['success' => true, 'message' => 'Vue enregistrée avec succès.', 'data' => $proposition]);
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
