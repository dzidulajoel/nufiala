<?php
require_once('../config/cnx.php');

if (!isset($_GET['token'])) {
        header("Location: ../connexion");
        exit;
}

$token = $_GET['token'];

// Vérifier le token directement dans la table password_resets
$sql = "SELECT * FROM password_resets WHERE token = :token LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['token' => $token]);
$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset) {
        header("Location: ../connexion");
        exit;
}

// Vérifier si le token a déjà été utilisé ou expiré
if ($reset['used'] == 1 || strtotime($reset['expires_at']) < time()) {
        header("Location: ../connexion");
        exit;
}