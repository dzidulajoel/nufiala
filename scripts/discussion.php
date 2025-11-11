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

    if (empty($data['idSession']) || empty($data['idSuiveur'])) {
        echo json_encode(['success' => false, 'message' => 'Paramètres manquants.']);
        exit;
    }

    // Lire tous les messages
    $stmt = $pdo->prepare("UPDATE Messages 
        SET lu = 1 
        WHERE destinataire_id = :id_destinataire 
        AND expediteur_id = :id_expediteur 
        AND lu = 0
    ");

    $stmt->execute([
        ':id_destinataire' => $data['idSession'],
        ':id_expediteur' => $data['idSuiveur']
    ]);


    // Tous les messages
    $sql = "SELECT 
            m.id,
            m.expediteur_id,
            m.destinataire_id,
            m.contenu,
            m.date_envoi,
            m.lu,
            m.created_at,
            u_expediteur.nom AS expediteur_nom,
            u_expediteur.prenom AS expediteur_prenom,
            u_destinataire.nom AS destinataire_nom,
            u_destinataire.prenom AS destinataire_prenom
        FROM Messages m
        JOIN utilisateurs u_expediteur ON u_expediteur.id = m.expediteur_id
        JOIN utilisateurs u_destinataire ON u_destinataire.id = m.destinataire_id
        WHERE 
            (m.expediteur_id = :idSession AND m.destinataire_id = :idSuiveur)
            OR
            (m.expediteur_id = :idSuiveur AND m.destinataire_id = :idSession)
        ORDER BY m.date_envoi ASC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'idSession' => $data['idSession'],
        'idSuiveur' => $data['idSuiveur']
    ]);

    $discussion = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'discussion' => $discussion
    ]);

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
