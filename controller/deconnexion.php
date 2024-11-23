<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\key;

use \Firebase\JWT\JWT;

class Deconnexion
{
    public function __construct() {}

    public function index()
    {
        $jwt = $_COOKIE['jwtToken'];
    }

    public function logout()
    {
        $secret_key = "123456";
        // Répondre aux requêtes préflight (OPTIONS)
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $jwt = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
            $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));

            echo json_encode([
                'status' => 'deconnexion',
                'data' => []
            ]);
            http_response_code(200); // Réponse OK
            return;
        } else {
            echo json_encode([
                'status' => 'failed',
                'data' => [],
                'message' => 'Erreur de deconnexion',
            ]);
        }
    }
}

    // Déconnexion
