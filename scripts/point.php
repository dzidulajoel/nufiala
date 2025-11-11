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

    // Vérifie les champs nécessaires
    if (empty($data['idReceveur']) || empty($data['idEnvoyeur']) || empty($data['idInvitation']) || empty($data['idPost']) || !isset($data['point']) || empty($data['invitation_type'])) {
        echo json_encode(['success' => false, 'message' => 'Données incomplètes.']);
        exit;
    }

    $id = Uuid::uuid4()->toString();
    $idEnvoyeur = htmlspecialchars($data['idEnvoyeur']);
    $idReceveur = htmlspecialchars($data['idReceveur']);
    $idInvitation = htmlspecialchars($data['idInvitation']);
    $idPost = htmlspecialchars($data['idPost']);
    $pointsEnvoyes = (int)$data['point'];
    $type_invitation = htmlspecialchars($data['invitation_type']);

    // Déterminer correctement l'envoyeur et le receveur selon le type
    if ($type_invitation === 'proposition') {
        $id_point_envoyeur = $idEnvoyeur;
        $id_point_receveur = $idReceveur;
    } else { // 'recherche'
        $id_point_envoyeur = $idEnvoyeur; // celui qui perd les points
        $id_point_receveur = $idReceveur; // celui qui reçoit
    }

    // Vérifie les points disponibles de l'envoyeur
    $stmt = $pdo->prepare("SELECT points FROM utilisateurs WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $id_point_envoyeur]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $points_disponibles = (int)$result['points'];

    if ($points_disponibles < $pointsEnvoyes) {
        echo json_encode(['success' => false, 'message' => 'Points insuffisants.']);
        exit;
    }

    // 1️⃣ Insérer l'opération dans la table Points
    $stmt = $pdo->prepare("INSERT INTO Points (
        id, id_envoyeur, id_receveur, id_invitation, id_post, points_envoyes, created_at, updated_at
    ) VALUES (
        :id, :id_envoyeur, :id_receveur, :id_invitation, :id_post, :points_envoyes, NOW(), NOW()
    )");

    $stmt->execute([
        ':id' => $id,
        ':id_envoyeur' => $id_point_envoyeur,
        ':id_receveur' => $id_point_receveur,
        ':id_invitation' => $idInvitation,
        ':id_post' => $idPost,
        ':points_envoyes' => $pointsEnvoyes
    ]);

    // 2️⃣ Déduire les points de l'envoyeur
    $nouveau_point_envoyeur = $points_disponibles - $pointsEnvoyes;
    $stmt = $pdo->prepare("UPDATE utilisateurs SET points = :points WHERE id = :id");
    $stmt->execute([':points' => $nouveau_point_envoyeur, ':id' => $id_point_envoyeur]);

    // 3️⃣ Ajouter les points au receveur
    $stmt = $pdo->prepare("SELECT points FROM utilisateurs WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $id_point_receveur]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $points_receveur = (int)$result['points'];
    $nouveau_point_receveur = $points_receveur + $pointsEnvoyes;

    $stmt = $pdo->prepare("UPDATE utilisateurs SET points = :points WHERE id = :id");
    $stmt->execute([':points' => $nouveau_point_receveur, ':id' => $id_point_receveur]);

    echo json_encode([
        'success' => true,
        'message' => 'Points attribués avec succès.',
        'point' => $nouveau_point_envoyeur
    ]);

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
