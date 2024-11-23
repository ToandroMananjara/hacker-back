<?php
class CommentController
{


    public function __construct() {}

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new Database();
            $conn = $db->getConnexion();

            $comment = new Comments($conn);

            $data = json_decode(file_get_contents("php://input"), true);
            $postId = $data['post_id'];
            $content = trim($data['content']); // Pas besoin de real_escape_string avec PDO
            $userId = 1;


            $comment->entry_id = $postId;
            $comment->content = $content;
            $comment->user_id = $userId;

            $postOwnerId = $comment->getPostOwner();

            if ($postOwnerId === false) {
                throw new Exception("Le post n'existe pas");
            }

            $commentId = $comment->create();
            $data = [];

            if ($commentId) {
                $commentCount = $comment->countCommentsForPost();
                // $this->notification->create($userId, $postOwnerId, 'comment');
                $allComments = $comment->read();

                echo json_encode([
                    'status' => 'success',
                    'data' => $allComments,
                    'commentCount' => $commentCount
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function deleteComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $db = new Database();
            $conn = $db->getConnexion();

            $comment = new Comments($conn);

            $data = json_decode(file_get_contents("php://input"), true);
            $commentId = $data['comment_id'];

            $comment->id =  $commentId;

            $isCommentExist = $comment->checkIsCommentExists();

            $isDelete = $comment->delete();

            if (!$isCommentExist) {
                http_response_code(300);
                echo json_encode([
                    'message' => 'Commnentaire n\'existe pas',
                ], JSON_UNESCAPED_UNICODE);
            } else {
                $isDelete = $comment->delete();
                // $this->notification->create($userId, $postOwnerId, 'comment');
                $allComments = $comment->read();
                http_response_code(200);
                echo json_encode([
                    'message' => 'Commentaire et ses réactions supprimés avec succès',
                    'data' => $allComments
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
