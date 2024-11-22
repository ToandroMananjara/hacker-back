<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;

class SignIn
{
    public function __construct() {}

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization");

        echo "we're welcome";
    }

    public function authenticate()
    {
        $secret_key = "123456";

        // Répondre aux requêtes préflight (OPTIONS)
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = new Database();
            $conn = $data->getConnexion();
            $user = new Users($conn);

            $input = json_decode(file_get_contents('php://input'), true);
            $email = $input['email'] ?? null;
            $password = $input['password'] ?? null;

            $isUser = $user->isAuthentify($email, $password);
            if ($isUser) {
                // Clé secrète pour signer le JWT

                // Créer un token JWT (si l'email et le mot de passe sont valides)
                $issued_at = time();
                $expiration_time = $issued_at + 3600000; // Le token expire dans 1 heure
                $payload = [
                    "iat" => $issued_at,
                    "exp" => $expiration_time,
                    "email" => $email,
                    "user_id" => $user->id
                ];

                $jwt = JWT::encode($payload, $secret_key, 'HS256');
                // Créer un tableau avec les données de l'utilisateur

                $userData = [
                    'user_id' => $user->id, // Assurez-vous que cette propriété existe dans $isUser
                    'email' => $user->email,
                    'username' => $user->username,
                    'token' => $jwt, // Générer un token si nécessaire
                ];


                echo json_encode([
                    'status' => 'success',
                    'data' => $userData,
                ]);
                http_response_code(200); // Réponse OK
                return;
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'data' => [],
                    'message' => 'Email ou mot de passe incorrect.',
                ]);
            }
        }
    }

    // Déconnexion
    public function logout()
    {
        exit;
    }
}
