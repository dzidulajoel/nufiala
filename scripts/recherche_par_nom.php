<?php

session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id_session = $_SESSION['id_utilisateur'];
    $nom_de_la_recherche = isset($data['nom_de_la_recherche']) ? trim($data['nom_de_la_recherche']) : '';

    if ($nom_de_la_recherche === '') {
        $sql = "SELECT 
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
                ORDER BY RAND()";
        $stmt = $pdo->query($sql);
    } else {
        $sql = "SELECT 
                    p.*,
                    u.nom,
                    u.prenom,
                    u.avatar,
                    u.email,
                    u.points,
                    u.niveau,
                    u.note_moyenne
                FROM Propositions p
                JOIN utilisateurs u ON p.id_utilisateur = u.id
                WHERE u.nom LIKE :recherche OR u.prenom LIKE :recherche
                ORDER BY RAND()";
        $stmt = $pdo->prepare($sql);
        $searchTerm = "%$nom_de_la_recherche%";
        $stmt->bindValue(':recherche', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
    }

    $propositions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 🔍 Ajouter le status pour chaque proposition
    foreach ($propositions as &$proposition) {
        $check = $pdo->prepare("SELECT status FROM Invitations WHERE id_envoyeur = ? AND id_post = ?");
        $check->execute([$id_session, $proposition['id']]);
        $status = $check->fetchColumn();

        // Ajouter la valeur du status dans le tableau
        $proposition['status_invitation'] = $status ?: null;
        $checkFollow = $pdo->prepare("SELECT 1 FROM abonnements 
                                  WHERE abonner_verifie = 1
                                  AND (
                                      (id_suiveur = :id_session AND id_suivi = :id_prop)
                                      OR (id_suiveur = :id_prop AND id_suivi = :id_session)
                                  )
                                  LIMIT 1");
                $checkFollow->execute([
                    ':id_session' => $id_session,
                    ':id_prop' => $proposition['id_utilisateur']
                ]);
                $proposition['est_abonne'] = $checkFollow->fetchColumn() ? true : false;


    }

    echo json_encode([
        'success' => true,
        'data' => $propositions,
        'nombre' => count($propositions)
    ]);



} 
catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
