<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Utilisateur non connecté'
        ]);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['idSession']) || empty($data['idSuiveur'])) {
        echo json_encode(['success' => false, 'message' => 'Champs manquants']);
        exit;
    }

    $sql_non_lus = "SELECT COUNT(*) AS non_lus
                    FROM Messages
                    WHERE destinataire_id = :idSession
                    AND expediteur_id = :idSuiveur
                    AND lu = 0";
    $stmt = $pdo->prepare($sql_non_lus);
    $stmt->execute([
        'idSession' => $data['idSession'],
        'idSuiveur' => $data['idSuiveur']
    ]);
    $nb_non_lus = $stmt->fetch(PDO::FETCH_ASSOC)['non_lus'] ?? 0;

    echo json_encode([
        'success' => true,
        'data' => (int)$nb_non_lus
    ]);

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Erreur serveur'
    ]);
}
