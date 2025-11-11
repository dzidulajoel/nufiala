<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';



if (!isset($_SESSION['id_utilisateur'])) {
    echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM utilisateurs ORDER BY created_at  DESC
    ");
$stmt->execute();
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT 
            (SELECT COUNT(*) FROM utilisateurs) AS total_utilisateurs,
            (SELECT COUNT(*) FROM Propositions) AS total_posts,
            (SELECT COUNT(*) FROM Invitations WHERE status = 'acceptee') AS total_invitations_acceptees
    ";
    
    $stmt = $pdo->query($sql);
    $totaux = $stmt->fetch(PDO::FETCH_ASSOC);

