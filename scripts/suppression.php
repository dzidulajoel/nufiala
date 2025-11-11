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

    if (empty($data['id'])) {
        echo json_encode(['success' => false, 'message' => 'ID de Post manquant.']);
        exit;
    }

    $id_utilisateur = $_SESSION['id_utilisateur'];
    $id_suppression = htmlspecialchars(trim($data['id']));

    // Vérifie que la proposition appartient bien à l'utilisateur connecté
    $check = $pdo->prepare("SELECT id FROM Propositions WHERE id = :id AND id_utilisateur = :id_utilisateur");
    $check->execute([
        'id' => $id_suppression,
        'id_utilisateur' => $id_utilisateur
    ]);

    if ($check->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Post introuvable ou non autorisée.']);
        exit;
    }

    // Suppression
    $delete = $pdo->prepare("DELETE FROM Propositions WHERE id = :id AND id_utilisateur = :id_utilisateur");
    $delete->execute([
        'id' => $id_suppression,
        'id_utilisateur' => $id_utilisateur
    ]);

    $sql_historique = "SELECT * FROM Propositions WHERE id_utilisateur = :id_utilisateur";

    $stmt = $pdo->prepare($sql_historique);
    $stmt->execute(['id_utilisateur' => $id_utilisateur]);
    $historique = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $nombre_propositions = count($historique);

    echo json_encode([
        'success' => true,
        'message' => 'Post supprimée avec succès.',
        'count' => $nombre_propositions,
        'id' => $id_suppression
    ]);
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
