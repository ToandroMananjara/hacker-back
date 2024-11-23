<?php
class User
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

                $users = new Users($conn);

                $allUsers = $users->read();

                echo json_encode([
                    'status' => 'success',
                    'data' => $allUsers
                ], JSON_UNESCAPED_UNICODE);
                http_response_code(200);
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $users = new Users($conn);
                $input = json_decode(file_get_contents('php://input'), true);
                $username = $input['username'] ?? null;
                $email = $input['email'] ?? null;
                $password = $input['password'] ?? null;

                $users->username = $username;
                $users->email = $email;
                $users->password = $password;

                if (isset($username) && isset($email) && isset($password)) {
                    $isEmailExist = $users->checkIfEmailExists();
                    if ($isEmailExist) {
                        echo json_encode([
                            'status' => 'failed',
                            'message' => 'email existe deja',
                            'data' => []
                        ], JSON_UNESCAPED_UNICODE);
                        http_response_code(200);
                    } else {
                        $isCreate = $users->create();
                        if ($isCreate) {
                            echo json_encode([
                                'status' => 'success',
                                'data' => []
                            ], JSON_UNESCAPED_UNICODE);
                            http_response_code(200);
                        }
                    }
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $users = new Users($conn);

                // Récupérer l'ID de l'utilisateur à partir des paramètres de l'URL
                $input = json_decode(file_get_contents('php://input'), true);
                $userId = $input['user_id'] ?? null;

                if ($userId === null) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'user_id is required'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                    return;
                }

                $users->id = $userId;

                // Vérifier si l'utilisateur existe avant de supprimer
                if (!$users->readOne()) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'User not found'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(404);
                    return;
                }

                // Supprimer l'utilisateur
                $isDeleted = $users->delete();
                if ($isDeleted) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'User deleted successfully'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                } else {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Failed to delete user'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                }
            } catch (PDOException $e) {
                echo json_encode([
                    'status' => 'failed',
                    'error' => 'Bad request',
                    'message' => $e->getMessage()
                ], JSON_UNESCAPED_UNICODE);
                http_response_code(400);
            }
        }
    }
    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $users = new Users($conn);

                // Récupérer les données de la requête
                $input = json_decode(file_get_contents('php://input'), true);
                $userId = $input['user_id'] ?? null;
                $username = $input['username'] ?? null;
                $email = $input['email'] ?? "";
                $password = $input['password'] ?? "";

                if ($userId === null) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'user_id is required'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                    return;
                }

                $users->id = $userId;

                // Vérifier si l'utilisateur existe
                if (!$users->readOne()) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'User not found'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(404);
                    return;
                }

                // Mettre à jour les données
                if ($username) {
                    $users->username = $username;
                }
                if ($email) {
                    $users->email = $email;
                }
                if ($password) {
                    $users->password = $password;
                }

                $isUpdated = $users->update();
                if ($isUpdated) {
                    $userUpdated = $users->readOne();
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'User updated successfully',
                        'user' => $userUpdated
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                } else {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Failed to update user'

                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                }
            } catch (PDOException $e) {
                echo json_encode([
                    'status' => 'failed',
                    'error' => 'Bad request',
                    'message' => $e->getMessage()
                ], JSON_UNESCAPED_UNICODE);
                http_response_code(400);
            }
        }
    }
}
