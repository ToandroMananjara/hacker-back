<?php
require_once 'vendor/autoload.php';


class Deconnexion
{
    public function __construct() {}

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $emotions = new Emotions($conn);
                $allEmotions = $emotions->readAll();

                if ($allEmotions) {
                    # code...
                    echo json_encode([
                        'status' => 'success',
                        'data' => $allEmotions,
                        // 'datas' => $datas,
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}

    // Déconnexion
