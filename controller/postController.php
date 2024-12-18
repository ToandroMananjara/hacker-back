<?php
class PostController
{
    public function __construct() {}
    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $user_id = $_GET['user_id'];
            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $entries = new Entries($conn);
                $allPosts = $entries->read();


                $user = new Users($conn);

                $emotion = new Emotions($conn);
                $reactionEntries = new ReactionEntries($conn);


                foreach ($allPosts as $key => $post) {
                    $comments = new Comments($conn);
                    $user->id = $post['user_id'];
                    $userPost = $user->readOne();

                    $emotion->emotion_id = $post['emotion_id'];
                    $userEmotion = $emotion->readOne();

                    $comments->entry_id = $post['entry_id'];
                    $comment = $comments->readAllByEntry_id();


                    $reactionEntries->entry_id = $post['entry_id'];
                    $likeCount = $reactionEntries->getLikesCount();
                    $reactPost = $reactionEntries->read();

                    $reactionEntries->user_id = $user_id;
                    $reactionEntries->entry_id = $post['entry_id'];
                    $reactionEntries->reaction_type = 'like';

                    $isLike = $reactionEntries->isLiked();

                    $datas[] = [
                        "username" => $userPost['username'],
                        "user_id" => $user->id,
                        "profilePhoto" => "",
                        "entry_id" => $post['entry_id'],
                        "well_being_score" => $post["well_being_score"],
                        "notes" => $post["notes"],
                        "positive_moment" => $post["positive_moment"],
                        "created_at" => $post["created_at"],
                        "isAnonyme" => $post["isAnonyme"],
                        "emotion" => $userEmotion,
                        "reaction" => [
                            "likeCount" => $likeCount,
                            "isLiked" => $isLike,
                            "reacts" => $reactPost
                        ],
                        "comments" => $comment
                    ];
                }

                echo json_encode([
                    'status' => 'success',
                    'data' => $datas,
                    // 'datas' => $datas,
                ], JSON_UNESCAPED_UNICODE);
                http_response_code(200);
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function createPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $entries = new Entries($conn);

                $input = json_decode(file_get_contents('php://input'), true);

                $user_id = $input['user_id'] ?? null;
                $emotion_id = $input['emotion_id'] ?? null;
                $well_being_score = $input['well_being_score'] ?? null;
                $notes = $input['notes'] ?? '';
                $positive_moment = $input['positive_moment'] ?? '';
                $isAnonyme = $input['isAnonyme'] ?? null;

                $entries->user_id = $user_id;
                $entries->emotion_id = $emotion_id;
                $entries->well_being_score = $well_being_score;
                $entries->notes = $notes;
                $entries->positive_moment = $positive_moment;
                $entries->isAnonyme = $isAnonyme;

                $isCreate = $entries->create();

                if ($isCreate) {
                    $entries->entry_id = $isCreate;
                    $posts = $entries->readAllByUser();
                    echo json_encode([
                        'status' => 'success',
                        'data' => $posts
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'é', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function deletePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $input = json_decode(file_get_contents('php://input'), true);

                $entries = new Entries($conn);
                $entry_id = $input['entry_id'];

                $entries->entry_id = $entry_id;
                $isDelete = $entries->delete();

                if ($isDelete) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => "entrie avec id " . $entry_id . " supprimé"
                        //'data' => $allPosts,
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'é', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function updatePost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

            try {
                // Connexion à la base de données
                $db = new Database();
                $conn = $db->getConnexion();

                // Création de l'objet Entries
                $entries = new Entries($conn);

                // Récupération des données JSON
                $input = json_decode(file_get_contents('php://input'), true);

                // Vérification de la présence de l'entry_id
                if (!isset($input['entry_id'])) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'entry_id is required'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                    return;
                }

                // Assignation des valeurs
                $entry_id = $input['entry_id'];
                $user_id = $input['user_id'] ?? null;
                $emotion_id = $input['emotion_id'] ?? null;
                $well_being_score = $input['well_being_score'] ?? null;
                $notes = $input['notes'] ?? '';
                $positive_moment = $input['positive_moment'] ?? '';
                $isAnonyme = $input['isAnonyme'] ?? null;

                // Affectation des valeurs à l'objet Entries
                $entries->entry_id = $entry_id;
                $entries->user_id = $user_id;
                $entries->emotion_id = $emotion_id;
                $entries->well_being_score = $well_being_score;
                $entries->notes = $notes;
                $entries->positive_moment = $positive_moment;
                $entries->isAnonyme = $isAnonyme;

                // Vérification si l'entrée existe avant de tenter la mise à jour
                if (!$entries->checkIfEntryExists()) {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Entry with the provided entry_id does not exist'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(404);
                    return;
                }

                // Mise à jour de l'entrée
                $isUpdate = $entries->update();

                if ($isUpdate) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => "Entry with id " . $entry_id . " has been successfully updated"
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                } else {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Failed to update entry'
                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(400);
                }
            } catch (PDOException $e) {
                // Gestion des erreurs avec une réponse appropriée
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
