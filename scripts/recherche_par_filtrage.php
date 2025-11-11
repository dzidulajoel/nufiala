<?php
// session_start();
// require_once('../config/cnx.php');
// header('Content-Type: application/json');

// try {
//     $input = file_get_contents('php://input');
//     $data = json_decode($input, true);
//     $response = ['success' => false, 'message' => ''];


//     $nom_de_la_recherche = isset($data['nom_de_la_recherche']) ? trim($data['nom_de_la_recherche']) : '';
//     $valeursCochees_c = $data['valeursCochees_c'] ?? [];
//     $valeursCochees_n = $data['valeursCochees_n'] ?? [];
//     $valeursCochees_mode = $data['valeursCochees_mode'] ?? [];
//     $valeursCochees_moments = $data['valeursCochees_moments'] ?? [];

//     // Requête de base
//     $sql = "SELECT 
//             p.*,
//             u.nom,
//             u.prenom,
//             u.avatar,
//             u.email,
//             u.niveau,
//             u.points,
//             u.note_moyenne
//         FROM Propositions p
//         JOIN utilisateurs u ON p.id_utilisateur = u.id
//         WHERE 1=1";

//     $params = [];

//     // --- Filtre sur le nom ou prénom ---
//     if ($nom_de_la_recherche !== '') {
//         $sql .= " AND (u.nom LIKE :recherche OR u.prenom LIKE :recherche)";
//         $params[':recherche'] = "%$nom_de_la_recherche%";
//     }

//     // --- Filtres dynamiques ---
//     // Catégories
//     if (!empty($valeursCochees_c)) {
//         $placeholders = [];
//         foreach ($valeursCochees_c as $index => $value) {
//             $key = ":cat_$index";
//             $placeholders[] = $key;
//             $params[$key] = $value;
//         }
//         $sql .= " AND p.categorie_proposition IN (" . implode(',', $placeholders) . ")";
//     }

//     // Niveaux
//     if (!empty($valeursCochees_n)) {
//         $placeholders = [];
//         foreach ($valeursCochees_n as $index => $value) {
//             $key = ":niv_$index";
//             $placeholders[] = $key;
//             $params[$key] = $value;
//         }
//         $sql .= " AND p.niveau_propose IN (" . implode(',', $placeholders) . ")";
//     }

//     // Modes d’échange
//     if (!empty($valeursCochees_mode)) {
//         $placeholders = [];
//         foreach ($valeursCochees_mode as $index => $value) {
//             $key = ":mode_$index";
//             $placeholders[] = $key;
//             $params[$key] = $value;
//         }
//         $sql .= " AND p.Mode_d_echange_proposition IN (" . implode(',', $placeholders) . ")";
//     }

//     // Disponibilités
//     if (!empty($valeursCochees_moments)) {
//         $placeholders = [];
//         foreach ($valeursCochees_moments as $index => $value) {
//             $key = ":mom_$index";
//             $placeholders[] = $key;
//             $params[$key] = $value;
//         }
//         $sql .= " AND p.Disponibilite_proposition IN (" . implode(',', $placeholders) . ")";
//     }

//     $sql .= " ORDER BY RAND()";

//     // Préparation et exécution
//     $stmt = $pdo->prepare($sql);
//     foreach ($params as $key => $value) {
//         $stmt->bindValue($key, $value, PDO::PARAM_STR);
//     }
//     $stmt->execute();

//     $propositions = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $nombre_proposition = count($propositions);

//     foreach ($propositions as &$proposition) {
//         $check = $pdo->prepare("SELECT status FROM Invitations WHERE id_envoyeur = ? AND id_post = ?");
//         $check->execute([$id_session, $proposition['id']]);
//         $status = $check->fetchColumn();

//         // Ajouter la valeur du status dans le tableau
//         $proposition['status_invitation'] = $status ?: null;
//         $checkFollow = $pdo->prepare("SELECT 1 FROM abonnements 
//                                   WHERE abonner_verifie = 1
//                                   AND (
//                                       (id_suiveur = :id_session AND id_suivi = :id_prop)
//                                       OR (id_suiveur = :id_prop AND id_suivi = :id_session)
//                                   )
//                                   LIMIT 1");
//                 $checkFollow->execute([
//                     ':id_session' => $id_session,
//                     ':id_prop' => $proposition['id_utilisateur']
//                 ]);
//                 $proposition['est_abonne'] = $checkFollow->fetchColumn() ? true : false;


//     }

//     echo json_encode([
//         'success' => true,
//         'data' => $propositions,
//         'nombre' => $nombre_proposition
//     ]);
// } catch (PDOException $e) {
//     error_log("Erreur PDO : " . $e->getMessage());
//     echo json_encode([
//         'success' => false,
//         'message' => 'Erreur de base de données. Veuillez réessayer plus tard.'
//     ]);
// }


session_start();
require_once('../config/cnx.php');
header('Content-Type: application/json');

try {
    // === SÉCURITÉ: récupérer l'id de session ===
    if (!isset($_SESSION['id_utilisateur'])) {
        echo json_encode(['success' => false, 'message' => 'Aucun utilisateur connecté.']);
        exit;
    }
    $id_session = $_SESSION['id_utilisateur'];

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $response = ['success' => false, 'message' => ''];

    $nom_de_la_recherche = isset($data['nom_de_la_recherche']) ? trim($data['nom_de_la_recherche']) : '';
    $valeursCochees_c = $data['valeursCochees_c'] ?? [];
    $valeursCochees_n = $data['valeursCochees_n'] ?? [];
    $valeursCochees_mode = $data['valeursCochees_mode'] ?? [];
    $valeursCochees_moments = $data['valeursCochees_moments'] ?? [];

    // Requête de base
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
        WHERE 1=1";

    $params = [];

    // Filtre nom/prenom
    if ($nom_de_la_recherche !== '') {
        $sql .= " AND (u.nom LIKE :recherche OR u.prenom LIKE :recherche)";
        $params[':recherche'] = "%$nom_de_la_recherche%";
    }

    // Catégories
    if (!empty($valeursCochees_c)) {
        $placeholders = [];
        foreach ($valeursCochees_c as $index => $value) {
            $key = ":cat_$index";
            $placeholders[] = $key;
            $params[$key] = $value;
        }
        $sql .= " AND p.categorie_proposition IN (" . implode(',', $placeholders) . ")";
    }

    // Niveaux
    if (!empty($valeursCochees_n)) {
        $placeholders = [];
        foreach ($valeursCochees_n as $index => $value) {
            $key = ":niv_$index";
            $placeholders[] = $key;
            $params[$key] = $value;
        }
        $sql .= " AND p.niveau_propose IN (" . implode(',', $placeholders) . ")";
    }

    // Modes d’échange
    if (!empty($valeursCochees_mode)) {
        $placeholders = [];
        foreach ($valeursCochees_mode as $index => $value) {
            $key = ":mode_$index";
            $placeholders[] = $key;
            $params[$key] = $value;
        }
        $sql .= " AND p.Mode_d_echange_proposition IN (" . implode(',', $placeholders) . ")";
    }

    // Disponibilités
    if (!empty($valeursCochees_moments)) {
        $placeholders = [];
        foreach ($valeursCochees_moments as $index => $value) {
            $key = ":mom_$index";
            $placeholders[] = $key;
            $params[$key] = $value;
        }
        $sql .= " AND p.Disponibilite_proposition IN (" . implode(',', $placeholders) . ")";
    }

    $sql .= " ORDER BY RAND()";

    // Préparation et exécution principale
    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }
    $stmt->execute();

    $propositions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $nombre_proposition = count($propositions);

    // Préparer une fois les requêtes utilisées dans la boucle
    $checkInv = $pdo->prepare("SELECT status FROM Invitations WHERE id_envoyeur = ? AND id_post = ?");
    $checkFollow = $pdo->prepare("
        SELECT 1 FROM abonnements 
        WHERE abonner_verifie = 1
          AND (
              (id_suiveur = :id_session AND id_suivi = :id_prop)
              OR (id_suiveur = :id_prop AND id_suivi = :id_session)
          )
        LIMIT 1
    ");

    foreach ($propositions as &$proposition) {
        // Invitation status
        $checkInv->execute([$id_session, $proposition['id']]);
        $status = $checkInv->fetchColumn();
        $proposition['status_invitation'] = $status ?: null;

        // Follow status
        if ($proposition['id_utilisateur'] === $id_session) {
            $proposition['est_abonne'] = null;
        } else {
            $checkFollow->execute([
                ':id_session' => $id_session,
                ':id_prop' => $proposition['id_utilisateur']
            ]);
            $proposition['est_abonne'] = $checkFollow->fetchColumn() ? true : false;
        }
    }
    unset($proposition); // bonne pratique pour référence

    echo json_encode([
        'success' => true,
        'data' => $propositions,
        'nombre' => $nombre_proposition
    ]);
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Erreur de base de données. Veuillez réessayer plus tard.'
    ]);
}
