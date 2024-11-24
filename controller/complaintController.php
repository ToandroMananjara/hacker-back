<?php
class ComplaintController
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

                $complaints = new Complaints($conn);


                $getComplaint = $complaints->readAll();
                if ($getComplaint) {
                    echo json_encode([
                        'status' => 'success',
                        'data' => $getComplaint

                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function TotalPlaintesResponse()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $complaints = new Complaints($conn);


                $getComplaint = $complaints->readAll();
                if ($getComplaint) {
                    echo json_encode([
                        'status' => 'success',
                        'data' => $getComplaint

                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                } else {
                    throw new Exception("Aucun fichier téléchargé ou erreur dans le téléchargement.");
                }
            } catch (Exception $e) {
                // Gérer les erreurs
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
