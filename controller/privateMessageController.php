<?php
class PrivateMessageController
{
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

                $user_id = $_GET['user_id'];

                $privateMessages = new PrivateMessages($conn);
                $privateMessages->sender_id = $user_id;
                $messageUsers = $privateMessages->getUsersAndLastExchangedMessage();

                $data = [];
                foreach ($messageUsers as $key => $messageUser) {
                    $receveir_user = new stdClass();

                    $user = new Users($conn);
                    $user->id = $messageUser['user_id'];
                    $myUser = $user->readOne();

                    $profilePhoto = new ProfilePhoto($conn);
                    $profilePhoto->user_id = $messageUser['user_id'];
                    $myProfilePhoto = $profilePhoto->readByUserId();


                    $receveir_user->user_id = $myUser['id'];
                    $receveir_user->username = $myUser['username'];
                    $receveir_user->profilePhoto = $myProfilePhoto['photo_path'];
                    $receveir_user->last_message = $messageUser['content'];

                    $data[] = $receveir_user;
                }

                echo json_encode([
                    'status' => 'success',
                    'data' => $data,
                    // 'datas' => $datas,
                ], JSON_UNESCAPED_UNICODE);
                http_response_code(200);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }
}
