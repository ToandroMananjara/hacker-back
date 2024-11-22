<?php
class ReactPost
{
    public function __construct() {}

    public function reactPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $reactionEntries = new ReactionEntries($conn);

                $input = json_decode(file_get_contents('php://input'), true);

                $entry_id = $input['entry_id'];
                $user_id = $input['user_id'];
                $reaction_type = $input['reaction_type'];


                $reactionEntries->user_id = $user_id;
                $reactionEntries->entry_id = $entry_id;
                $reactionEntries->reaction_type = $reaction_type;

                $isReact = $reactionEntries->toggleLike();
                if ($isReact) {
                    $isLike = $reactionEntries->isLiked();
                    if ($isLike) {
                        echo json_encode([
                            'status' => 'success',
                            'message' => "L'utilisateur like le post"
                        ], JSON_UNESCAPED_UNICODE);
                        http_response_code(200);
                    } else {
                        echo json_encode([
                            'status' => 'success',
                            'message' => "L'utilisateur dislike le post"
                        ], JSON_UNESCAPED_UNICODE);
                        http_response_code(200);
                    }
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
