<?php
class Notifications
{
    private $table = "notification"; // Nom de la table
    private $connexion = null; // Connexion PDO

    public $id;
    public $actor_id;
    public $user_id;
    public $type;
    public $is_read;
    public $create_at;

    public function __construct($conn)
    {
        // Initialiser la connexion PDO
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Méthode pour créer une notification
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " 
                  (actor_id, user_id, type, is_read) 
                  VALUES (:actor_id, :user_id, :type, :is_read)";

        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':actor_id', $this->actor_id);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':is_read', $this->is_read, PDO::PARAM_BOOL);

        if ($stmt->execute()) {
            $this->id = $this->connexion->lastInsertId();
            return true;
        }

        return false;
    }

    // Méthode pour lire toutes les notifications
    public function read()
    {
        $query = "SELECT id, actor_id, user_id, type, is_read, create_at 
                  FROM " . $this->table . " 
                  ORDER BY create_at DESC";

        $stmt = $this->connexion->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour lire une notification spécifique par son ID
    public function readOne()
    {
        $query = "SELECT id, actor_id, user_id, type, is_read, create_at 
                  FROM " . $this->table . " 
                  WHERE id = :id";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour une notification
    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET actor_id = :actor_id, user_id = :user_id, type = :type, is_read = :is_read 
                  WHERE id = :id";

        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':actor_id', $this->actor_id);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':is_read', $this->is_read, PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Méthode pour supprimer une notification
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Méthode pour marquer une notification comme lue
    public function markAsRead()
    {
        $query = "UPDATE " . $this->table . " 
                  SET is_read = 1 
                  WHERE id = :id";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Méthode pour récupérer les notifications non lues d'un utilisateur
    public function getUnreadNotifications()
    {
        $query = "SELECT id, actor_id, user_id, type, is_read, create_at 
                  FROM " . $this->table . " 
                  WHERE user_id = :user_id AND is_read = 0 
                  ORDER BY create_at DESC";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
