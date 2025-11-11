<?php

session_start();
require_once('../../config/cnx.php');

$offre_id = htmlspecialchars($_GET['offre_id'] ?? '', ENT_QUOTES);

// Vérifie que l'ID n'est pas vide
if(!$offre_id) {
    die("Offre ID non fourni.");
}

// Préparer la requête pour récupérer l'offre et les infos utilisateur
$sql = "SELECT 
    p.*,
    u.nom,
    u.prenom,
    u.avatar,
    u.email,
    u.niveau,
    u.points,
    u.note_moyenne,
    u.sexe,
    u.telephone,
    u.bio,
    u.Competences_principales,
    u.Domaine_principal,
    u.localisation
FROM Propositions p
JOIN utilisateurs u ON p.id_utilisateur = u.id
WHERE p.id = :id
LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $offre_id]);

$proposition = $stmt->fetch(PDO::FETCH_ASSOC);


$formatter = new IntlDateFormatter(
    'fr_FR',
    IntlDateFormatter::NONE,
    IntlDateFormatter::NONE,
    'Europe/Paris',
    IntlDateFormatter::GREGORIAN,
    'MMMM yyyy'
);

// Récupération de la date
$created_at = $proposition['created_at'] ?? '';

$nom = $proposition['nom'] ?? '';
$prenom = $proposition['prenom'] ?? '';
$nom_court = substr(trim($nom), 0, 3);
$prenom_formatte = str_replace(' ', '_', trim($prenom));
$utilisateur = trim($nom_court . $prenom_formatte);
$pseudo = $utilisateur ? '@' . strtolower($utilisateur) : '@non_renseigne';