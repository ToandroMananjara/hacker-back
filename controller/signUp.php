<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;

class SignUp
{
    public function __construct() {}

    public function index()
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

            $username = $input['username'];
            $email = $input['email'];
            $password = $input['password'];
            $role = $input['role'];

            if (isset($username) &&  isset($email) && isset($role) && isset($password)) {
                $user->username = $username;
                $user->email = $email;
                $user->password = $password;
                $user->role = $role;

                $user->id = $user->create();

                $issued_at = time();
                $expiration_time = $issued_at + 3600000; // Le token expire dans 1 heure
                $payload = [
                    "iat" => $issued_at,
                    "exp" => $expiration_time,
                    "email" => $email,
                    "user_id" => $user->id
                ];
                $jwt = JWT::encode($payload, $secret_key, 'HS256');

                $userData = [
                    'user_id' => $user->id, // Assurez-vous que cette propriété existe dans $isUser
                    'email' => $user->email,
                    'username' => $user->username,
                    'role' => $user->role,
                    'token' => $jwt, // Générer un token si nécessaire
                ];

                echo json_encode([
                    'status' => 'success',
                    'message' => 'utilisateur créé',
                    'data' => $userData,
                ], JSON_UNESCAPED_UNICODE);
                http_response_code(200); // Réponse OK
                return;
            } else {
                echo json_encode([
                    'status' => 'failed',
                    'data' => [],
                    'message' => 'user non creé',
                ], JSON_UNESCAPED_UNICODE);
                // http_response_code(401); // Unauthorized
            }
        }
    }
}
