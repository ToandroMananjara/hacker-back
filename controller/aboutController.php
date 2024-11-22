<?php
class AboutController
{
    public function __construct() {}
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $about = new About($conn);

                $allAbouts = $about->readAll();


                if ($allAbouts) {
                    // Return the data as a JSON response
                    echo json_encode([
                        'status' => 'success',
                        'data' => $allAbouts
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    // If no records are found, return an empty array
                    echo json_encode([
                        'status' => 'success',
                        'data' => []
                    ], JSON_UNESCAPED_UNICODE);
                }
            } catch (PDOException $e) {
                // Gestion des erreurs PDO
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Erreur de base de données : ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.'], JSON_UNESCAPED_UNICODE);
        }
    }
    public function createAbout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $about = new About($conn);

                $input = json_decode(file_get_contents('php://input'), true);

                // Vérification des données
                $user_id = isset($input['user_id']) ? intval($input['user_id']) : null;
                $description = isset($input['description']) ? $input['description'] : null;

                $about->user_id = $user_id;
                $about->description = $description;

                $isCreate = $about->create();


                if ($isCreate) {
                    http_response_code(200);
                    echo json_encode(['status' => 'success', 'message' => 'Description ajoutée avec succès.'], JSON_UNESCAPED_UNICODE);
                } else {
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'insertion des données.'], JSON_UNESCAPED_UNICODE);
                }
            } catch (PDOException $e) {
                // Gestion des erreurs PDO
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Erreur de base de données : ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.'], JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateAbout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $about = new About($conn);

                $input = json_decode(file_get_contents('php://input'), true);

                // Vérification des données
                $user_id = isset($input['user_id']) ? intval($input['user_id']) : null;
                $description = isset($input['description']) ? $input['description'] : null;

                $about->user_id = $user_id;
                $about->description = $description;

                $isUpdate = $about->update();

                if ($isUpdate) {
                    http_response_code(200);
                    echo json_encode(['status' => 'success', 'message' => 'Description mise à jour avec succès.'], JSON_UNESCAPED_UNICODE);
                } else {
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la mise à jour des données.'], JSON_UNESCAPED_UNICODE);
                }
            } catch (PDOException $e) {
                // Gestion des erreurs PDO
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Erreur de base de données : ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.'], JSON_UNESCAPED_UNICODE);
        }
    }
}
