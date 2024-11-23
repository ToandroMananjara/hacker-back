<?php
class FollowerController
{
    private $db;
    private $follower;
    public function __construct() {}

    public function checkState()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $followers = new Followers($conn);

                $input = json_decode(file_get_contents('php://input'), true);
                $follower_id = $input['follower_id'];
                $followed_id = $input['followed_id'];

                $followers->followed_id = $followed_id;
                $followers->follower_id = $follower_id;

                // Vérifier si l'utilisateur suit déjà
                $state = $followers->check_State();

                if ($state) {
                    http_response_code(200);

                    json_encode([
                        'success' => true,
                        'isFollowing' => $state
                    ]);
                }
            } catch (PDOException $e) {
                json_encode([
                    'message' => $e
                ]);
            }
        }
    }
    public function follow()
    {

        // Vérification de la méthode HTTP
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['error' => 'Méthode non autorisée']);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $input = json_decode(file_get_contents('php://input'), true);

            $follower_id = $input['follower_id'];
            $followed_id = $input['followed_id'];

            // Vérifier que l'utilisateur ne tente pas de se suivre lui-même
            if ($follower_id === $followed_id) {
                echo json_encode(['error' => 'Impossible de se suivre soi-même']);
            }

            try {
                $db = new Database();
                $conn = $db->getConnexion();
                $followers = new Followers($conn);

                // Ajouter le follow dans la base de données
                $followers->follower_id = $follower_id;
                $followers->followed_id = $followed_id;

                $result = $followers->follow();

                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Utilisateur suivi avec succès'
                    ]);
                }
            } catch (Exception $e) {
                echo json_encode(['error' => 'Erreur lors du suivi: ' . $e->getMessage()]);
            }
        }
    }
    public function unfollow()
    {
        $db = new Database();
        $conn = $db->getConnexion();
        $followers = new Followers($conn);
        // Vérification de la méthode HTTP
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return json_encode(['error' => 'Méthode non autorisée']);
        }

        // Vérification des paramètres requis
        if (!isset($_POST['follower_id']) || !isset($_POST['following_id'])) {
            return json_encode(['error' => 'Paramètres manquants']);
        }

        $follower_id = $_POST['follower_id'];
        $following_id = $_POST['following_id'];

        // Vérifier que l'utilisateur ne tente pas de se suivre lui-même
        if ($follower_id === $following_id) {
            return json_encode(['error' => 'Impossible de se suivre soi-même']);
        }

        try {
            // supprimer le follow dans la base de dounfolnnées
            $result = $followers->unfollow($follower_id, $following_id);

            if ($result) {
                return json_encode([
                    'success' => true,
                    'message' => 'Utilisateur suivi avec succès'
                ]);
            }
        } catch (Exception $e) {
            return json_encode(['error' => 'Erreur lors du suivi: ' . $e->getMessage()]);
        }
    }
    public function allFriend()
    {
        $db = new Database();
        $conn = $db->getConnexion();
        $followers = new Followers($conn);

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
        $allContact = $followers->allFriend();
        http_response_code(200);
        echo json_encode(['status' => 'success', 'data' => $allContact]);
    }
}
