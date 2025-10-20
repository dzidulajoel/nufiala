<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    $id_session = $_SESSION['id_utilisateur'];

    $sql = 'UPDATE utilisateurs SET 
        nom = :nom,
        prenom = :prenom,
        nom_utilisateur = :nom_utilisateur,
        email = :email,
        telephone = :tel,
        sexe = :genre,
        date_de_naissance = :date_de_naissance,
        localisation = :localisation,
        bio = :description_profil,
        Domaine_principal = :domaine_principal,
        Competences_principales = :competences_principales,
        niveau = :niveau,
        Disponibilite = :disponibilite,
        Mode_d_echange = :mode_d_echange
    WHERE id = :id';

    $params = [
        ':nom' => $data['nom'],
        ':prenom' => $data['prenom'],
        ':nom_utilisateur' => $data['nom_utilisateur'],
        ':email' => $data['email'],
        ':tel' => $data['tel'],
        ':genre' => $data['genre'],
        ':date_de_naissance' => $data['date_de_naissance'],
        ':localisation' => $data['localisation'],
        ':description_profil' => $data['description_profil'],
        ':domaine_principal' => $data['domaine_principal'],
        ':competences_principales' => $data['competences_principales'],
        ':niveau' => $data['niveau'],
        ':disponibilite' => $data['disponibilite'],
        ':mode_d_echange' => $data['mode_d_echange'],
        ':id' => $id_session
    ];

    $req = $pdo->prepare($sql);
    $result = $req->execute($params);

    if ($result) {
        echo json_encode(['success' => true, 'data' => $data, 'message' => 'Modifications enregistrées', 'id'=> $id_session]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Échec de la mise à jour.']);
    }

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
}
