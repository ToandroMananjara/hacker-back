<?php

class NotificationController
{

    public function __construct() {}

    // Récupérer toutes les notifications d'un utilisateur
    public function getNotifications()
    {

        $input = json_decode(file_get_contents('php://input'), true);
        $userId = $input['user_id'];
        $db = new Database();
        $conn = $db->getConnexion();

        $notifications = new Notifications($conn);
        $notifications->user_id = $userId;
        $result = $notifications->read();

        if ($result) {
            http_response_code(200);
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Aucune notification trouvée."));
        }
    }

    // Compter les notifications non lues
    public function getUnreadCount()
    {

        $input = json_decode(file_get_contents('php://input'), true);
        $userId = $input['user_id'];
        $db = new Database();
        $conn = $db->getConnexion();

        $notifications = new Notifications($conn);
        $notifications->user_id = $userId;
        $count = $notifications->CountUnreadNotifications();

        http_response_code(200);
        echo json_encode(array("unread_count" => $count));
    }

    // Marquer une notification comme lue
    public function markAsRead()
    {
        $notificationId = $_GET['notification_id'];
        $db = new Database();
        $conn = $db->getConnexion();

        $notifications = new Notifications($conn);
        $notifications->id = $notificationId;

        if ($notifications->markAsRead()) {
            http_response_code(200);
            echo json_encode(array("message" => "Notification marquée comme lue."));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Impossible de marquer la notification comme lue."));
        }
    }
}
