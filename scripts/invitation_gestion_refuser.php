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

    $id_utilisateur = $_SESSION['id_utilisateur'];
    $id_demande = $data['refuser']; // UUID de la demande à accepter
    // Vérifier si la demande existe et que le receveur est bien l'utilisateur connecté
    $check = $pdo->prepare("
        SELECT id FROM Invitations 
        WHERE id = :id_demande 
        AND id_receveur = :id_receveur 
        AND status = 'en_attente'
    ");
    $check->execute([
        ':id_demande' => $id_demande,
        ':id_receveur' => $id_utilisateur
    ]);

    if ($check->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Aucune demande en attente trouvée.']);
        exit;
    }

    // Mettre à jour le statut
    $update = $pdo->prepare("
        UPDATE Invitations 
        SET status = 'refusee' 
        WHERE id = :id_demande
    ");
    $update->execute([':id_demande' => $id_demande]);

    echo json_encode([
        'success' => true,
        'message' => 'Demande acceptée avec succès.',
        'id_demande' => $id_demande
    ]);

} 
catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
