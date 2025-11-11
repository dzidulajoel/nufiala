<?php
session_start();
require_once('../config/cnx.php');
require_once '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

try {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $response = ['success' => false, 'message' => ''];

        if (empty($data['email'])) {
                echo json_encode(['success' => false, 'message' => 'Email requis']);
                exit();
        }

        $sql = "SELECT id, nom, prenom, email FROM utilisateurs WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $data['email']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
                echo json_encode(['success' => false, 'message' => 'Aucun utilisateur trouvé avec cet email']);
                exit();
        }

        $id = Uuid::uuid4()->toString();
        $token = hash('sha256', Uuid::uuid4()->toString() . time());
        $date_expiration = date('Y-m-d H:i:s', strtotime('+7 days'));

        $sql = "INSERT INTO password_resets (id, user_id, token, created_at, expires_at, used) 
                VALUES (:id, :user_id, :token, NOW(), :expires_at, 0)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                ':id' => $id,
                ':user_id' => $user['id'],
                ':token' => $token,
                ':expires_at' => $date_expiration
        ]);

        $base_url = "http://localhost/helpother/reinitialisation";
        $lien_complet = $base_url . "?token=" . urlencode($token);
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dzidulap6@gmail.com';
        $mail->Password = 'qncjmplygmhwruhc'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom('no-reply@nufiala.com', 'nufiala - Réinitialisation');
        $mail->addAddress($user['email']);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = 'Réinitialisation de votre mot de passe - nufiala';
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; background-color:#f4f6f8; padding:20px;'>
                <table align='center' width='600' style='background:#ffffff; border-radius:8px; padding:20px;'>
                <tr>
                        <td>
                        <h2 style='color:#1E2A78; text-align:center;'>Réinitialisation de votre mot de passe</h2>
                        <p>Bonjour <strong>{$user['prenom']} {$user['nom']}</strong>,</p>
                        <p>Vous avez demandé à réinitialiser votre mot de passe sur <strong>Nufiala</strong>.</p>
                        <p>Pour créer un nouveau mot de passe, cliquez simplement sur le bouton ci-dessous :</p>
                        <div style='text-align:center; margin:30px 0;'>
                                <a href='" . htmlspecialchars($lien_complet, ENT_QUOTES, 'UTF-8') . "'
                                style='background:#00B8D9; color:#fff; padding:14px 28px; border-radius:6px; text-decoration:none; font-weight:bold;'>
                                🔁 Réinitialiser mon mot de passe
                                </a>
                        </div>
                        <p>⏳ Ce lien expirera le <strong>" . date('d/m/Y H:i', strtotime($date_expiration)) . "</strong>.</p>
                        <p style='color:#555;'>Si vous n’êtes pas à l’origine de cette demande, ignorez simplement cet e-mail. Votre compte restera sécurisé.</p>
                        <hr style='margin:30px 0; border:none; border-top:1px solid #eee;'>
                        <p style='color:#999; font-size:12px; text-align:center;'>
                                Cet e-mail vous a été envoyé automatiquement par <strong>Nufiala</strong>.<br>
                                © " . date('Y') . " Nufiala — Tous droits réservés.
                        </p>
                        </td>
                </tr>
                </table>
        </div>
        ";

        $mail->send();
        echo json_encode(['success' => true, 'message' => 'Email de réinitialisation envoyé avec succès', 'data'=> $data]);

} catch (Exception $e) {
        error_log("Erreur : " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Une erreur interne est survenue.']);
}
