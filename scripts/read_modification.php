<?php

session_start();
require_once('../../config/cnx.php');

$offre_id = htmlspecialchars($_GET['offre_id'] ?? '', ENT_QUOTES);

// Vérifie que l'ID n'est pas vide
if(!$offre_id) {
    die("Offre ID non fourni.");
}

// Préparer la requête pour récupérer l'offre et les infos utilisateur
$sql = "SELECT * FROM Propositions WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $offre_id]);

$proposition = $stmt->fetch(PDO::FETCH_ASSOC);

// afficher les categories:
$domaines = [
    "Informatique & Programmation",
    "Design & Arts visuels",
    "Musique & Chant",
    "Langues & Traduction",
    "Enseignement & Formation",
    "Photographie & Vidéo",
    "Bricolage & Artisanat",
    "Cuisine & Pâtisserie",
    "Sport & Bien-être",
    "Agriculture & Jardinage",
    "Communication & Marketing",
    "Entrepreneuriat & Gestion",
    "Théâtre & Expression artistique",
    "Couture & Mode",
    "Innovation & Technologie",
    "Développement personnel",
    "Éducation & Pédagogie",
    "Électronique & Mécanique",
    "Écologie & Développement durable",
];