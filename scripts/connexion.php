<?php
session_start();
require_once('../config/cnx.php');
header('Content-Type: application/json');

try {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $response = ['success' => false, 'message' => ''];

        if (!empty($data['email']) && !empty($data['password'])) {
                $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
                $password = trim($data['password']);

                $sql = "SELECT * FROM utilisateurs WHERE email = :email";
                $req = $pdo->prepare($sql);
                $req->execute([':email' => $email]);
                $user = $req->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['mot_de_passe'])) {
                        session_regenerate_id(delete_old_session: true);
                        $_SESSION['id_utilisateur'] = $user['id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['role'] = $user['role'];

                        $response['success'] = true;
                        $response['role'] = $user['role'];
                        $response['message'] = 'Connexion réussie.';
                } else {
                        $response['message'] = 'Email ou mot de passe incorrect.';
                }
        } else {
                $response['message'] = 'Merci de bien vouloir remplir tous les champs.';
        }

        echo json_encode($response);
} catch (PDOException $e) {
        error_log("Erreur PDO : " . $e->getMessage());
        echo json_encode([
                'success' => false,
                'message' => 'Erreur de base de données. Veuillez réessayer plus tard.'
        ]);
}
