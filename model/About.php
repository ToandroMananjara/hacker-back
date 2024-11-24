<?php
class About
{
    private $table = "about";
    private $connexion = null;

    public $user_id;
    public $description;

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }


    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (user_id, description) VALUES (:user_id, :description)";
        $stmt = $this->connexion->prepare($query);

        // Bind des paramètres
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":description", $this->description);

        return $stmt->execute();
    }

    // Lire toutes les entrées
    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lire une entrée spécifique
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une entrée
    public function update()
    {
        $query = "UPDATE " . $this->table . " SET description = :description WHERE user_id = :user_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":user_id", $this->user_id);

        return $stmt->execute();
    }

    // Supprimer une entrée
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(":user_id", $this->user_id);

        return $stmt->execute();
    }
}
