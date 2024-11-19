<?php
class Emotions
{
    private $table = "emotions";
    private $connexion = null;

    public $emotion_id;
    public $emotion_name;

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Méthode pour créer une nouvelle émotion
    public function create()
    {
        // Requête d'insertion pour ajouter une émotion dans la base de données
        $query = "INSERT INTO " . $this->table . " (emotion_name) 
                  VALUES (:emotion_name)";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':emotion_name', $this->emotion_name);

        // Exécuter la requête et vérifier si l'insertion a réussi
        if ($stmt->execute()) {
            // Récupérer l'ID de la dernière insertion
            $this->emotion_id = $this->connexion->lastInsertId();
            return true;
        }
        return false;
    }

    // Méthode pour récupérer toutes les émotions
    public function readAll()
    {
        // Requête de sélection pour récupérer toutes les émotions
        $query = "SELECT emotion_id, emotion_name FROM " . $this->table;

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Exécuter la requête
        $stmt->execute();

        $emotions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Retourner les résultats
        return $emotions;
    }

    // Méthode pour récupérer une émotion spécifique par ID sous forme de tableau associatif
    public function readOne()
    {
        // Requête de sélection pour récupérer une seule émotion
        $query = "SELECT emotion_id, emotion_name 
                      FROM " . $this->table . " WHERE emotion_id = :emotion_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre
        $stmt->bindParam(':emotion_id', $this->emotion_id);

        // Exécuter la requête
        $stmt->execute();

        $emotion = $stmt->fetch(PDO::FETCH_ASSOC);
        // Retourner le résultat sous forme de tableau associatif
        return $emotion;
    }

    // Méthode pour mettre à jour une émotion
    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET emotion_name = :emotion_name 
                  WHERE emotion_id = :emotion_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':emotion_id', $this->emotion_id);
        $stmt->bindParam(':emotion_name', $this->emotion_name);

        // Exécuter la requête et vérifier si la mise à jour a réussi
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Méthode pour supprimer une émotion par ID
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE emotion_id = :emotion_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre
        $stmt->bindParam(':emotion_id', $this->emotion_id);

        // Exécuter la requête et vérifier si la suppression a réussi
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
