<?php 
session_start();
require_once('../config/cnx.php');

if (!isset($_SESSION['id_utilisateur'])) {
    echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
    exit;
}

$id_session = $_SESSION['id_utilisateur'];

// recuperation des informations utilisateurs:

        $sql = "SELECT  *  FROM utilisateurs  WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->execute(array(
                ":id" => $id_session
        ));
        $data_utilisateur = $req->fetch(PDO::FETCH_ASSOC);

        $dateSQL = $data_utilisateur['created_at'];
        $date = new DateTime($dateSQL);

        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            'Europe/Paris',
            IntlDateFormatter::GREGORIAN,
            'MMMM yyyy'
        );

        $nom = $data_utilisateur['nom'] ?? '';
        $prenom = $data_utilisateur['prenom'] ?? '';
        $nom_court = substr(trim($nom), 0, 3);
        $prenom_formatte = str_replace(' ', '_', trim($prenom));
        $utilisateur = trim($nom_court . $prenom_formatte);
        $pseudo = $utilisateur ? '@' . strtolower($utilisateur) : '@non_renseigne';


