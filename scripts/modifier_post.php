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

    $id_session = $_SESSION['id_utilisateur'];

    // Vérifie que l'id de la proposition est fourni
    if (empty($data['id'])) {
        echo json_encode(['success' => false, 'message' => 'ID de la proposition manquant.']);
        exit;
    }

    $id_proposition = $data['id'];

    // Prépare la requête UPDATE
    $sql = "UPDATE Propositions SET
        Titre_de_la_competence = :Titre,
        categorie_proposition = :Categorie,
        niveau_propose = :Niveau,
        description_proposition = :Description,
        Disponibilite_proposition = :Disponibilite,
        Mode_d_echange_proposition = :Mode,
        Lieu_proposition = :Lieu
        WHERE id = :id AND id_utilisateur = :id_utilisateur";

    $stmt = $pdo->prepare($sql);

    $success = $stmt->execute([
        ':Titre' => $data['Titre_de_la_competence'],
        ':Categorie' => $data['categorie_proposition'],
        ':Niveau' => $data['niveau_proposition'],
        ':Description' => $data['description_proposition'],
        ':Disponibilite' => $data['Disponibilite_proposition'],
        ':Mode' => $data['Mode_d_echange_proposition'],
        ':Lieu' => $data['Lieu_proposition'],
        ':id' => $id_proposition,
        ':id_utilisateur' => $id_session
    ]);

    if ($success) {
        echo json_encode(['success' => true, 'message' => 'Proposition modifiée avec succès !']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la modification.']);
    }

} catch (PDOException $e) {
    error_log("Erreur PDO lors de la modification : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Une erreur interne est survenue. Veuillez réessayer plus tard.']);
}
