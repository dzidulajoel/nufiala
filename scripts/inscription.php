<?php
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

header('Content-Type: application/json');

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $response = ['success' => false, 'message' => ''];


    if (
        isset($data['nom']) &&
        isset($data['prenom']) &&
        isset($data['email']) &&
        isset($data['password']) &&
        isset($data['conf_password'])
    ) {
        $nom = htmlspecialchars(trim($data['nom']));
        $prenom = htmlspecialchars(trim($data['prenom']));
        $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($data['password']);
        $conf_password = trim($data['conf_password']);
        $id = Uuid::uuid4()->toString();


        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($conf_password)) {
            $response['message'] = 'Veuillez remplir tous les champs.';
            echo json_encode($response);
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['message'] = 'Le format de l\'adresse e-mail est invalide.';
            echo json_encode($response);
            exit();
        }



        $sqlCheckEmail = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmtCheckEmail = $pdo->prepare($sqlCheckEmail);
        $stmtCheckEmail->execute([':email' => $email]);
        if ($stmtCheckEmail->fetchColumn() > 0) {
            $response['message'] = 'Cette adresse e-mail est déjà utilisée.';
            echo json_encode($response);
            exit();
        }

        if (strlen($password) < 8) {
            $response['message'] = 'Le mot de passe est inférieur à 8 caratères';
            echo json_encode($response);
            exit();
        }

        if ($password !== $conf_password) {
            $response['message'] = 'Les mots de passe sont pas identiques.';
            echo json_encode($response);
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(16));


        $sql = "INSERT INTO utilisateurs (id,nom, prenom, email, mot_de_passe, token_api, role)
                VALUES (:id, :nom, :prenom, :email,  :mot_de_passe, :token, :role)";
        $req = $pdo->prepare($sql);
        $result = $req->execute([
            ":id" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":email" => $email,
            ":mot_de_passe" => $hashed_password,
            ":token" => $token,
            ":role" => "user"
        ]);

        if ($result) {

            echo json_encode($response = [
            'success' => true,
            'message' => 'Votre compte a été créé avec succès !',
            'data' => $data,
            'id' => $id
        ]);
        } else {

            echo json_encode($response = [
            'success' => false,
            'message' => 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.'
        ]);

        }


    } else {
       echo json_encode ($response = ['message' => 'Données manquantes. Veuillez fournir toutes les informations requises.']);
    }

} catch (PDOException $e) {
    error_log("Erreur PDO lors de l'inscription : " . $e->getMessage());
    $response = ['success' => false, 'message' => 'Une erreur interne est survenue. Veuillez réessayer plus tard.'];
    echo json_encode($response);
}
