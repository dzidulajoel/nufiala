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

    $id_utilisateur = $_SESSION['id_utilisateur'];

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id_proposition = $data['id'] ?? null;
    if (!$id_proposition) {
        echo json_encode(['success' => false, 'message' => 'Aucune proposition spécifiée.']);
        exit;
    }

    // Récupérer l'ID du créateur de la proposition
    $stmt = $pdo->prepare("SELECT id_utilisateur FROM Propositions WHERE id = :id_proposition");
    $stmt->execute([':id_proposition' => $id_proposition]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Proposition introuvable.']);
        exit;
    }

    $id_createur = $result['id_utilisateur'];

    // Vérifier si le like existe déjà
    $check = $pdo->prepare("SELECT id_like FROM likes WHERE id_utilisateur = ? AND id_proposition = ?");
    $check->execute([$id_utilisateur, $id_proposition]);
    $like = $check->fetchColumn();

    if ($like) {
        // Supprime le like existant
        $delete = $pdo->prepare("DELETE FROM likes WHERE id_like = ?");
        $delete->execute([$like]);
        echo json_encode(['success' => true, 'liked' => false, 'message' => 'Like supprimé.']);
    } else {
        // Ajouter un nouveau like avec id_createur
        $id_like = Uuid::uuid4()->toString();
        $insert = $pdo->prepare("
            INSERT INTO likes (id_like, id_utilisateur, id_proposition, id_createur)
            VALUES (:id_like, :id_utilisateur, :id_proposition, :id_createur)
        ");
        $insert->execute([
            ':id_like' => $id_like,
            ':id_utilisateur' => $id_utilisateur,
            ':id_proposition' => $id_proposition,
            ':id_createur' => $id_createur
        ]);
        echo json_encode(['success' => true, 'liked' => true, 'message' => 'Like ajouté.']);
    }

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
