<?php
class ReactionEntries
{
    private $connexion = null; // Connexion PDO    private $table = "reaction_entries"; // Nom de la table
    private $table = "reaction_entries";
    public $user_id;
    public $entry_id;
    public $reaction_type = 'like'; // On suppose qu'il n'y a que des "J'aime" pour cette table

    // Constructeur qui initialise la connexion à la base de données
    public function __construct($conn)
    {
        $this->connexion = $conn;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE entry_id = :entry_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Ajouter un "J'aime" (ou retirer si déjà existant)
    public function toggleLike()
    {
        // Vérifier si une réaction existe déjà pour cet utilisateur et cette entrée
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id AND entry_id = :entry_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Si une ligne existe, cela signifie que l'utilisateur a déjà "aimé" l'entrée
            // On supprime la ligne pour retirer le "J'aime"
            return $this->removeLike();
        } else {
            // Si aucune ligne n'existe, on ajoute un "J'aime"
            return $this->addLike();
        }
    }

    // Ajouter un "J'aime"
    private function addLike()
    {
        $query = "INSERT INTO " . $this->table . " (user_id, entry_id, reaction_type) VALUES (:user_id, :entry_id, :reaction_type)";
        $stmt = $this->connexion->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->bindParam(':reaction_type', $this->reaction_type);

        // Exécuter la requête
        if ($stmt->execute()) {
            return true; // Retourne true si l'ajout a réussi
        }

        return false; // Retourne false en cas d'erreur
    }

    // Retirer un "J'aime"
    private function removeLike()
    {
        $query = "DELETE FROM " . $this->table . " WHERE user_id = :user_id AND entry_id = :entry_id";
        $stmt = $this->connexion->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':entry_id', $this->entry_id);

        // Exécuter la requête
        if ($stmt->execute()) {
            return true; // Retourne true si la suppression a réussi
        }

        return false; // Retourne false en cas d'erreur
    }

    // Vérifier si l'utilisateur a "aimé" cette entrée
    public function isLiked()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id AND entry_id = :entry_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->execute();

        return ($stmt->rowCount() > 0); // Retourne true si "J'aime" existe, sinon false
    }

    // Retourner le nombre de "J'aime" sur une entrée
    public function getLikesCount()
    {
        $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE entry_id = :entry_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->execute();
        return $stmt->fetchColumn(); // Retourne le nombre de "J'aime" pour cette entrée
    }
}
