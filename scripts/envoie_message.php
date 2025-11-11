<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté']);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['idSession']) || empty($data['idSuiveur']) || empty($data['message'])) {
        echo json_encode(['success' => false, 'message' => 'Champs manquants']);
        exit;
    }

    $idMessage = Uuid::uuid4()->toString();
    $dateEnvoi = date('Y-m-d H:i:s');

    $sql = "INSERT INTO Messages (id, expediteur_id, destinataire_id, contenu, date_envoi, lu, created_at)
            VALUES (:id, :expediteur_id, :destinataire_id, :contenu, :date_envoi, 0, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $idMessage,
        'expediteur_id' => $data['idSession'],
        'destinataire_id' => $data['idSuiveur'],
        'contenu' => trim($data['message']),
        'date_envoi' => $dateEnvoi
    ]);

    


    echo json_encode([
        'success' => true,
        'message' => 'Message envoyé avec succès',
        'data' => [
            'id' => $idMessage,
            'expediteur_id' => $data['idSession'],
            'destinataire_id' => $data['idSuiveur'],
            'contenu' => htmlspecialchars($data['message']),
            'date_envoi' => $dateEnvoi
        ]
    ]);
} 
catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur serveur']);
}
