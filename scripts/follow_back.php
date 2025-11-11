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

    $sql = "UPDATE abonnements
        SET abonner_verifie = 1
        WHERE id_suiveur = :id_suiveur
          AND id_suivi = :id_suivi";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_suiveur' => $data['idSuiveur'],
        'id_suivi'   => $data['idSession']
    ]);


    // $id_abonnement = Uuid::uuid4()->toString();
    //     $insert = $pdo->prepare("INSERT INTO abonnements (id, id_suiveur, id_suivi, abonner_verifie, type) VALUES (:id, :id_suiveur, :id_suivi, 1, 'abonner_retour')");
    //     $insert->execute([
    //         ':id' => $id_abonnement,
    //         ':id_suiveur' => $data['idSession'],
    //         ':id_suivi' => $data['idSuiveur']
    //     ]);

    echo json_encode(['success' => true, 'data' => $data]);
} 

catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
