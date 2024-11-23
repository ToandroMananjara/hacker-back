<?php
class ProfileController
{
    public function __construct() {}

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_id = $_GET['user_id'];

            try {
                $db = new Database();
                $conn = $db->getConnexion();
                /**
                 * user
                 * about : id, description
                 * allPosts for the current user
                 * profile picture
                 * cover picture
                 * contact ??
                 * 
                 */
                $user = new Users($conn);
                $reactComment = new ReactionComments($conn);
                $about = new About($conn);
                $entries = new Entries($conn);
                $coverPhoto = new CoverPhoto($conn);
                $profilePhoto = new ProfilePhoto($conn);

                // $follow = new Follow($conn);
                $user->id = $user_id;
                $userCurrent = $user->readOne();

                $about->user_id = $user_id;
                $aboutUserCurrent = $about->readOne();

                $entries->user_id = $user_id;
                $allPosts  = $entries->readAllByUser();

                $profilePhoto = new ProfilePhoto($conn);
                $profilePhoto->user_id = $user_id;

                $coverPhoto = new CoverPhoto($conn);
                $coverPhoto->user_id = $user_id;

                $userProfilePhoto = $profilePhoto->readByUserId();
                $userCoverPhoto = $profilePhoto->readByUserId();

                // $about->id;
                if ($userCurrent) {

                    echo json_encode([
                        'status' => 'success',
                        'user' => $userCurrent,
                        'about' => $aboutUserCurrent,
                        'posts' => $allPosts ? $allPosts : [],
                        'profilePhoto' => $userProfilePhoto,
                        'coverPhoto' => $userCoverPhoto

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
