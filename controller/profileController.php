<?php
class profileController
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
                $user =
                    $reactComment = new ReactionComments($conn);

                $input = json_decode(file_get_contents('php://input'), true);
                $comment_id = $input['comment_id'];
                $user_id = $input['user_id'];

                $reactComment->user_id = $user_id;
                $reactComment->comment_id = $comment_id;

                $isReact = $reactComment->toggleLike();

                if ($isReact) {
                    $allReacts = $reactComment->readAll();
                    echo json_encode([
                        'status' => 'success',
                        'data' => $allReacts
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
