<?php

class PrivateMessages
{
    private $table = 'private_messages';
    private $connexion = null;
    public $id;
    public $sender_id;
    public $receiver_id;
    public $content;
    public $sent_at;

    // Constructor to initialize the PDO connection
    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Method to get all messages
    public function getAllMessages()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to get messages by sender
    public function getMessagesBySender()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE sender_id = :sender_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':sender_id', $this->sender_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to get messages by receiver
    public function getMessagesByReceiver()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE receiver_id = :receiver_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':receiver_id', $this->receiver_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to get messages between two users
    public function getMessagesBetweenUsers($sender_id, $receiver_id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':sender_id', $sender_id);
        $stmt->bindParam(':receiver_id', $receiver_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to get messages sent after a specific date
    public function getMessagesAfterDate($date)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE sent_at > :date";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to get the count of messages sent by a specific user
    public function countMessagesBySender()
    {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE sender_id = :sender_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':sender_id', $this->sender_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to get the count of messages received by a specific user
    public function countMessagesByReceiver()
    {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE receiver_id = :receiver_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':receiver_id', $this->receiver_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to update a message's content
    public function updateMessageContent()
    {
        $query = "UPDATE " . $this->table . " SET content = :content WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function getUsersAndLastExchangedMessage()
    {
        // Query to get the latest message exchanged with each user
        $query = "
                    SELECT 
                        CASE 
                            WHEN sender_id = :current_user_id THEN receiver_id
                            ELSE sender_id
                        END AS user_id,
                        MAX(sent_at) AS last_message_sent_at,
                        (SELECT content 
                        FROM " . $this->table . " 
                        WHERE 
                            ((sender_id = :current_user_id AND receiver_id = user_id) 
                            OR (sender_id = user_id AND receiver_id = :current_user_id))
                        ORDER BY sent_at DESC 
                        LIMIT 1) AS content,
                        (SELECT sender_id 
                        FROM " . $this->table . " 
                        WHERE 
                            ((sender_id = :current_user_id AND receiver_id = user_id) 
                            OR (sender_id = user_id AND receiver_id = :current_user_id))
                        ORDER BY sent_at DESC 
                        LIMIT 1) AS sender_id,
                        (SELECT receiver_id 
                        FROM " . $this->table . " 
                        WHERE 
                            ((sender_id = :current_user_id AND receiver_id = user_id) 
                            OR (sender_id = user_id AND receiver_id = :current_user_id))
                        ORDER BY sent_at DESC 
                        LIMIT 1) AS receiver_id
                    FROM " . $this->table . "
                    WHERE sender_id = :current_user_id OR receiver_id = :current_user_id
                    GROUP BY user_id
                    ORDER BY last_message_sent_at DESC
                ";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':current_user_id', $this->sender_id);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
