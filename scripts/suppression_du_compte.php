<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

header('Content-Type: application/json');

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    $id = $data['utilisateurId'] ?? null;
    if (!$id) {
        echo json_encode(['success' => false, 'message' => 'ID utilisateur manquant.']);
        exit;
    }

    // Vérifier que l'utilisateur connecté supprime bien son compte
    if ($_SESSION['id_utilisateur'] != $id) {
        echo json_encode(['success' => false, 'message' => 'Action non autorisée.']);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
    if ($stmt->execute([$id])) {
        session_destroy(); // détruire la session si suppression réussie
        echo json_encode(['success' => true, 'message' => 'Suppression réussie']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression.']);
    }
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
