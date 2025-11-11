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

    $sql_update = "UPDATE Notifications 
               SET lue = 1 
               WHERE id_utilisateur = :id_utilisateur AND lue = 0";
    $stmt = $pdo->prepare($sql_update);
    $stmt->execute(['id_utilisateur' => $_SESSION['id_utilisateur']]);

    echo json_encode([
        'success' => true,
        'message' => 'Notifications marquées comme lues'
    ]);


} 
catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}