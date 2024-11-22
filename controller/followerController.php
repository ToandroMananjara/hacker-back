<?php
    require_once '../model/Followers.php';
    class FollowerController {
        private $db;
        private $follower;      
        public function __construct($db) {
            $this->db = $db;
            $this->followers = new Follower($db);
        }
        public function checkState()
        {
            if (!isset($_POST['follower_id']) || !isset($_POST['following_id'])) {
                return json_encode(['error' => 'Paramètres manquants']);
            }
        
            $follower_id = $_POST['follower_id'];
            $following_id = $_POST['following_id'];
        
            // Vérifier si l'utilisateur suit déjà
            $state = $this->followers->checkFollowState($follower_id, $following_id);
            
            return json_encode([
                'success' => true,
                'isFollowing' => $state
            ]);       
        }
        public function follow() {
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
                // Ajouter le follow dans la base de données
                $result = $this->followers->follow($follower_id, $following_id);
                
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
        public function unfollow(){
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
                $result = $this->followers->unfollow($follower_id, $following_id);
                
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
        public function allFriend(){
            if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
                http_response_code(200);
                exit();
            }
            $allContact= $this->followers->allFriend();
            http_response_code(200);
            echo json_encode(['status' => 'success', 'data' => $allContact]);
        }
    }
?>