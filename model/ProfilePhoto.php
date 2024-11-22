<?php
class ProfilePhoto
{
    private $table = "profile_photo"; // Nom de la table
    private $connexion = null; // Connexion à la base de données

    public $photo_id; // ID de la photo
    public $user_id; // ID de l'utilisateur associé
    public $photo_path; // Chemin vers la photo de profil
    public $uploaded_at; // Date de téléchargement

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Ajouter une nouvelle photo de profil
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (user_id, photo_path, uploaded_at) VALUES (:user_id, :photo_path, NOW())";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':photo_path', $this->photo_path);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lire la photo de profil d'un utilisateur
    public function readByUserId()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id ORDER BY uploaded_at DESC LIMIT 1";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour la photo de profil d'un utilisateur
    public function update()
    {
        $query = "UPDATE " . $this->table . " SET photo_path = :photo_path, uploaded_at = NOW() WHERE user_id = :user_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':photo_path', $this->photo_path);
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Supprimer une photo de profil
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE photo_id = :photo_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':photo_id', $this->photo_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Supprimer toutes les photos de profil d'un utilisateur
    public function deleteByUserId()
    {
        $query = "DELETE FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
