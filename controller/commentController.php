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
            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $comment = new Comments($conn);

                $data = json_decode(file_get_contents("php://input"), true);
                $postId = $data['entry_id'];
                $content = trim($data['content']); // Pas besoin de real_escape_string avec PDO
                $userId = $data['user_id'];


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
                    $comment->id = $commentId;
                    $allComments = $comment->read();

                    $data = [];
                    foreach ($allComments as $key => $allComment) {
                        $comment = new stdClass();

                        $user = new Users($conn);
                        $user->id = $allComment['user_id'];
                        $userComment = $user->readOne();

                        $comment->id = $allComment['id'];
                        $comment->user_id = $allComment['user_id'];
                        $comment->username = $userComment['username'];
                        $comment->comment = $allComment['content'];
                        $comment->created_at = $allComment['created_at'];


                        $data[] = $comment;
                    }


                    $userComment = $user->readOne();

                    echo json_encode([
                        'status' => 'success',
                        'data' => $data,
                        'commentCount' => $commentCount
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode([
                        'status' => 'success',
                        'data' => $comment,
                        'commentCount' => "x"
                    ], JSON_UNESCAPED_UNICODE);
                }
            } catch (PDOException $e) {
                echo $e;
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
