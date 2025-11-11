<?php
        require_once('../config/cnx.php');
        header('Content-Type: application/json');

try {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $response = ['success' => false, 'message' => ''];
        $token = $data['token'];

        $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = :token AND used = 0 AND expires_at > NOW()");
        $stmt->execute(['token' => $token]);
        $reset = $stmt->fetch();

        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $stmt->execute(['id' => $reset['user_id']]);
        $current_user = $stmt->fetch();

        $hashed = password_hash($data['pwd'], PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("UPDATE utilisateurs SET mot_de_passe = :pwd WHERE id = :id");
        $stmt->execute(['pwd' => $hashed, 'id' => $reset['user_id']]);

        $stmt = $pdo->prepare("UPDATE password_resets SET used = 1 WHERE id = :id");
        $stmt->execute(['id' => $reset['id']]);

        
        echo json_encode([
                'success' => true, 
                'message' => 'Réinitialisation éffectueé avec succès', 
                'data' => [$data['pwd'], $data['pwd_conf'], $data['token'], $reset['user_id'], $current_user['nom']]
        ]);

} catch (Exception $e) {
        error_log("Erreur : " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Une erreur interne est survenue.']);
}