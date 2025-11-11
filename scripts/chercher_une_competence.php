<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $response = ['success' => false, 'message' => ''];

        if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    $id_session = $_SESSION['id_utilisateur'];
    $id = Uuid::uuid4()->toString();

    $sql = "INSERT INTO Propositions (
        id,
        Titre_de_la_competence,
        categorie_proposition,
        niveau_propose,
        description_proposition,
        Disponibilite_proposition,
        Mode_d_echange_proposition,
        Lieu_proposition,
        type,
        id_utilisateur 
    ) VALUES (
        :id,
        :Titre,
        :Categorie,
        :Niveau,
        :Description,
        :Disponibilite,
        :Mode,
        :Lieu,
        :type,
        :id_utilisateur
    )";

    $stmt = $pdo->prepare($sql);

    $success = $stmt->execute([
        ':id' => $id,
        ':Titre' => $data['titre_Competence_recherche'],
        ':Categorie' => $data['categorie_recherche'],
        ':Niveau' => $data['niveau_recherche'],
        ':Description' => $data['description_recherche'],
        ':Disponibilite' => $data['Disponibilite_recherche'],
        ':Mode' => $data['Mode_d_echange_recherche'],
        ':Lieu' => $data['Lieu_recherche'],
        ':type' => 'recherche',
        ':id_utilisateur' => $id_session
    ]);

    if ($success) {
        echo json_encode(['success' => true, 'message' => 'Recherche enregistrée avec succès !']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l’enregistrement.']);
    }

}
catch (PDOException $e) {
    error_log("Erreur PDO lors de l'inscription : " . $e->getMessage());
    $response = ['success' => false, 'message' => 'Une erreur interne est survenue. Veuillez réessayer plus tard.'];
    echo json_encode($response);
}