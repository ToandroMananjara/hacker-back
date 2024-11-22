<?php
class CommentController
{
    private $conn = null;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnexion();
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new Users($this->conn);

            $data = json_decode(file_get_contents("php://input"));
            $postId = (int) $data['post_id'];
            $content = trim($data['content']); // Pas besoin de real_escape_string avec PDO
            $userId = 1;

            $comment = new Comments($this->conn);
            $comment->post_id = $postId;
            $comment->content = $content;
            $comment->user_id = $userId;

            $postOwnerId = $comment->getPostOwner();

            if ($postOwnerId === false) {
                throw new Exception("Le post n'existe pas");
            }

            $commentId = $comment->create();

            if ($commentId) {
                $comment->updateCommentCount();
                // $this->notification->create($userId, $postOwnerId, 'comment');
                echo json_encode([
                    'status' => 'success',
                    'data' => '',
                ]);
            }

            echo json_encode([
                'status' => 'success',
                'data' => '',
            ]);
        }


        throw new Exception("Erreur lors de l'ajout du commentaire");
    }
}
