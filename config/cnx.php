<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'nufiala');
define('DB_USER', 'root');
define('DB_PASS', '');
// define('DB_USER', 'dzidula_joel');
// define('DB_PASS', 'cqqhI-LrJ%ePlvH!');


try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {

    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données.']);
    error_log("DB Connection Error: " . $e->getMessage());
    exit();
}
