<?php
    require_once 'Notifications.php';
    class Follower
    {
        private $table='followers';
        private $connexion = null;
        public $id;
        public $follower_id;
        public $followed_id;
       
        public function __construct($conn)
        {
            // Initialiser la connexion PDO
            if ($this->connexion == null) {
            $this->connexion = $conn;
            }
        }
        public function check_state()
        {
                $query = "SELECT * FROM " . $this->table . " WHERE follower_id = :follower_id AND followed_id = :followed_id";
                
                $stmt = $this->connexion->prepare($query);
                
                // Lier les paramètres
                $stmt->bindParam(':follower_id', $this->follower_id);
                $stmt->bindParam(':followed_id', $this->followed_id);
                
                // Exécuter la requête
                $stmt->execute();
                
                // Retourner true si l'utilisateur suit déjà, false sinon
                return $stmt->rowCount() > 0;
        }
        public function follow($follower_id, $followed_id)
        {
            //apetraka controller // // Vérifier et décoder les données JSON reçues
            // $data = json_decode(file_get_contents("php://input"), true);
            // if (!$data || !isset($data['follower_id']) || !isset($data['followed_id'])) {
            //     http_response_code(400);
            //     echo json_encode(['status' => 'error', 'message' => 'Données de suivi invalides']);
            //     exit();
            // }

            $this->follower_id = $follower_id;
            $this->followed_id = $followed_id;

            // Préparer et exécuter la requête SQL
            $query = "INSERT INTO " . $this->table . " (follower_id, followed_id) 
                     VALUES (:follower_id, :followed_id) 
                     ON DUPLICATE KEY UPDATE follower_id = follower_id";

            $stmt = $this->connexion->prepare($query);
            $stmt->bindParam(':follower_id', $this->follower_id);
            $stmt->bindParam(':followed_id', $this->followed_id);

            if ($stmt->execute()) {
                // Insérer une notification
                $notification_type = 'follow';
                $is_read = 0;  // Les nouvelles notifications sont non lues
                $notification = new Notifications($this->connexion);
                $notification->actor_id = $this->follower_id;
                $notification->user_id = $this->followed_id;
                $notification->type = $notification_type;
                $notification->is_read = $is_read;
                $notification->create();
                if ($notification_stmt->execute()) {
                    echo json_encode(['status' => 'success', 'message' => 'Utilisateur suivi et notification envoyée']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'envoi de la notification']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erreur lors du suivi']);
            }
        }
        public function unfollow($follower_id, $followed_id)
        {
            // Vérifier et décoder les données JSON reçues
            // $data = json_decode(file_get_contents("php://input"), true);
            // if (!$data || !isset($data['follower_id']) || !isset($data['followed_id'])) {
            //     http_response_code(400);
            //     echo json_encode(['status' => 'error', 'message' => 'Données de désabonnement invalides']);
            //     exit();
            // }

            $this->follower_id = $follower_id;
            $this->followed_id = $followed_id;

            // Préparer et exécuter la requête SQL pour supprimer la relation de suivi
            $query = "DELETE FROM " . $this->table . " WHERE follower_id = :follower_id AND followed_id = :followed_id";
            $stmt = $this->connexion->prepare($query);
            $stmt->bindParam(':follower_id', $this->follower_id);
            $stmt->bindParam(':followed_id', $this->followed_id);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Utilisateur désabonné avec succès']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erreur lors du désabonnement']);
            }
        }
        public function allFriend()
        {
            // Préparer la requête pour récupérer tous les followers
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->connexion->prepare($query);

            // Exécuter la requête
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return false;
        }
    }
?>