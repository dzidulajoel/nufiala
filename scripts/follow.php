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

    $id_suiveur = $_SESSION['id_utilisateur'];
    $id_suivi = $data['follow'];

    if ($id_suiveur === $id_suivi) {
        echo json_encode(['success' => false, 'message' => 'Impossible de se suivre soi-même.']);
        exit;
    }

    // Vérifier si l’abonnement existe déjà
    $check = $pdo->prepare("
        SELECT id FROM abonnements 
        WHERE id_suiveur = :id_suiveur AND id_suivi = :id_suivi
    ");
    $check->execute([
        ':id_suiveur' => $id_suiveur,
        ':id_suivi' => $id_suivi
    ]);
    $abonnement = $check->fetchColumn();

    // Suppression & ajout
    if ($abonnement) {
        // Si déjà abonné → désabonnement
        $delete = $pdo->prepare("DELETE FROM abonnements WHERE id = :id");
        $delete->execute([':id' => $abonnement]);

        echo json_encode([
            'success' => true,
            'followed' => false,
            'message' => 'Désabonné'
        ]);
    }
    else {
        // Sinon → création d’un nouvel abonnement
        $id_abonnement = Uuid::uuid4()->toString();
        $insert = $pdo->prepare("
            INSERT INTO abonnements (id, id_suiveur, id_suivi)
            VALUES (:id, :id_suiveur, :id_suivi)
        ");
        $insert->execute([
            ':id' => $id_abonnement,
            ':id_suiveur' => $id_suiveur,
            ':id_suivi' => $id_suivi
        ]);

        echo json_encode([
            'success' => true,
            'followed' => true,
            'message' => 'Abonné'
        ]);
    }
    
} 
catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}