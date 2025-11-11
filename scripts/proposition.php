<?php
session_start();
require_once('../config/cnx.php');

if (!isset($_SESSION['id_utilisateur'])) {
    echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
    exit;
}

$id_session = $_SESSION['id_utilisateur'];



$limit = 15;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Nombre total de propositions
$countSql = "SELECT COUNT(*) FROM Propositions";
$countReq = $pdo->query($countSql);
$totalResults = $countReq->fetchColumn();
$totalPages = ceil($totalResults / $limit);

// Récupération des propositions avec limite et offset
$sql = "SELECT 
    p.*,
    u.nom,
    u.prenom,
    u.avatar,
    u.email,
    u.niveau,
    u.points,
    u.note_moyenne
FROM Propositions p
JOIN utilisateurs u ON p.id_utilisateur = u.id
WHERE p.id_utilisateur != :id_session
ORDER BY RAND()
LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id_session', $id_session, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$propositions = $stmt->fetchAll(PDO::FETCH_ASSOC);
