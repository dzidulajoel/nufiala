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

    $idEnvoyeur = $data['idEnvoyeur'];
    $idReceveur = $data['idReceveur'];
    $note = (int)$data['note']; // 1 à 5
    $id = Uuid::uuid4()->toString();

    // Insertion de la note
    $stmt = $pdo->prepare("
        INSERT INTO Notations (id, id_envoyeur, id_receveur, note, created_at, updated_at)
        VALUES (:id, :id_envoyeur, :id_receveur, :note, NOW(), NOW())
    ");
    $stmt->execute([
        ':id' => $id,
        ':id_envoyeur' => $idEnvoyeur,
        ':id_receveur' => $idReceveur,
        ':note' => $note
    ]);

    // Mise à jour de la note moyenne de l'utilisateur
    $sql = "
        UPDATE utilisateurs u
        JOIN (
            SELECT id_receveur, AVG(note) AS moyenne
            FROM Notations
            GROUP BY id_receveur
        ) n ON u.id = n.id_receveur
        SET u.note_moyenne = n.moyenne
        WHERE u.id = :id_receveur
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_receveur' => $idReceveur]);

    echo json_encode([
        'success' => true,
        'message' => 'Note enregistrée'
    ]);

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de l’enregistrement de la notation.'
    ]);
}
