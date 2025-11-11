<?php
session_start();
require_once('../config/cnx.php');
require_once('../vendor/autoload.php');

header('Content-Type: application/json; charset=utf-8');

try {
    // ✅ Vérifie que l'utilisateur est connecté
    if (empty($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }

    // ✅ Récupère les données envoyées via fetch
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (empty($data['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun ID utilisateur fourni.']);
        exit;
    }

    $id_utilisateur = $data['id_utilisateur'];

    // ✅ Requête pour récupérer uniquement les infos utilisateur
    $sql = "SELECT 
            id,
            nom,
            prenom,
            avatar,
            email,
            niveau,
            points,
            note_moyenne,
            sexe,
            telephone,
            bio,
            Competences_principales,
            Domaine_principal,
            localisation
        FROM utilisateurs
        WHERE id = :id
        LIMIT 1
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id_utilisateur]);

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$utilisateur) {
        echo json_encode(['success' => false, 'message' => 'Utilisateur introuvable.']);
        exit;
    }

    echo json_encode(['success' => true, 'data' => $utilisateur], JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erreur interne du serveur.']);
    exit;
}
