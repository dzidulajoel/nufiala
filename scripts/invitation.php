<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Vérification session utilisateur
    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    $id_session = $_SESSION['id_utilisateur'];

    // Empêcher l'utilisateur de s'envoyer une invitation
    if ($id_session === $data['id']) {
        echo json_encode([
            'success' => false,
            'message' => "Vous ne pouvez pas vous envoyer une invitation."
        ]);
        exit;
    }

    // Vérifier si une invitation existe déjà
    $check = $pdo->prepare("
        SELECT id 
        FROM Invitations 
        WHERE id_envoyeur = ? 
        AND id_post = ? 
        AND id_receveur = ?
    ");
    $check->execute([$id_session, $data['type']['post_id'], $data['id']]);
    $invitation = $check->fetchColumn();

    if ($invitation) {
        // Supprimer l'invitation existante
        $delete = $pdo->prepare("DELETE FROM Invitations 
            WHERE id_envoyeur = ? 
            AND id_post = ? 
            AND id_receveur = ?
        ");
        $delete->execute([$id_session, $data['type']['post_id'], $data['id']]);

        echo json_encode([
            'success' => false,
            'annulation' => true,
            'textcontext' => "Annulation en cours ...",
            'message' => 'Invitation annulée.'
        ]);
        exit;
    }

    // Créer une nouvelle invitation
    $uuid_invitation = Uuid::uuid4()->toString();
    $status = "en_attente";
    $type = $data['type']['recherche'] ?? $data['type']['proposition'];

    $insert = $pdo->prepare("INSERT INTO Invitations (id, id_envoyeur, id_receveur, id_post, type, status) 
        VALUES (:id, :id_envoyeur, :id_receveur, :id_post, :type, :status)
    ");
    $insert->execute([
        ':id' => $uuid_invitation,
        ':id_envoyeur' => $id_session,
        ':id_receveur' => $data['id'],
        ':id_post' => $data['type']['post_id'],
        ':type' => $type,
        ':status' => $status
    ]);

    echo json_encode([
        'success' => true,
        'data' => [
            'envoyeur' => $id_session,
            'receveur' => $data['id'],
            'post' => $data['type']['post_id'],
            'status' => $status,
            'id_invitation' => $uuid_invitation
        ],
        'type' => $type,
        'message' => "Demande envoyée."
    ]);
    exit;
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Erreur de base de données. Veuillez réessayer plus tard.'
    ]);
    exit;
}
