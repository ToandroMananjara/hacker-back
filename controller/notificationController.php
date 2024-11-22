<?php
require_once '../model/Notifications.php';

class NotificationController {
    private $notifications;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->notifications = new Notifications($db);
    }

    // Récupérer toutes les notifications d'un utilisateur
    public function getNotifications($userId) {
        $this->notifications->user_id = $userId;
        $result = $this->notifications->read();
        
        if($result) {
            http_response_code(200);
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Aucune notification trouvée."));
        }
    }

    // Compter les notifications non lues
    public function getUnreadCount($userId) {
        $this->notifications->user_id = $userId;
        $count = $this->notifications->CountUnreadNotifications();
        
        http_response_code(200);
        echo json_encode(array("unread_count" => $count));
    }

    // Marquer une notification comme lue
    public function markAsRead($notificationId) {
        $this->notifications->id = $notificationId;
        
        if($this->notifications->markAsRead()) {
            http_response_code(200);
            echo json_encode(array("message" => "Notification marquée comme lue."));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Impossible de marquer la notification comme lue."));
        }
    }
}
