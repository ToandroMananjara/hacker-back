<?php
class Entries
{
    // Définir la table de la base de données
    private $table = "entries"; // Nom de la table associée
    private $connexion = null; // Connexion PDO

    // Propriétés de l'entrée
    public $entry_id;
    public $user_id;
    public $emotion_id;
    public $well_being_score;
    public $notes;
    public $positive_moment;
    public $created_at;
    public $isAnonyme;

    // Constructeur
    public function __construct($conn)
    {
        // Initialiser la connexion PDO si elle n'est pas déjà définie
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }


    // Méthode pour créer une entrée
    public function create()
    {
        // Vérification du score de bien-être (doit être entre 1 et 5)
        if ($this->well_being_score < 1 || $this->well_being_score > 5) {
            return false; // Retourne faux si le score est en dehors de la plage valide
        }

        // Requête SQL pour insérer une nouvelle entrée
        $query = "INSERT INTO " . $this->table . " 
                  (user_id, emotion_id, well_being_score, notes, positive_moment, isAnonyme) 
                  VALUES (:user_id, :emotion_id, :well_being_score, :notes, :positive_moment, :isAnonyme)";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':emotion_id', $this->emotion_id);
        $stmt->bindParam(':well_being_score', $this->well_being_score);
        $stmt->bindParam(':notes', $this->notes);
        $stmt->bindParam(':positive_moment', $this->positive_moment);
        $stmt->bindParam(':isAnonyme', $this->isAnonyme);

        // Exécuter la requête et vérifier si l'insertion a réussi
        if ($stmt->execute()) {
            // Récupérer l'ID de la dernière entrée insérée
            $this->entry_id = $this->connexion->lastInsertId();
            return $this->entry_id;
        }

        return false;
    }

    // Méthode pour lire toutes les entrées
    public function read()
    {
        // Requête pour récupérer toutes les entrées
        $query = "SELECT entry_id, user_id, emotion_id, well_being_score, notes, positive_moment, created_at, isAnonyme 
                  FROM " . $this->table;

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Exécuter la requête
        $stmt->execute();

        // Retourner toutes les entrées sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour lire une entrée spécifique par son ID
    public function readOne()
    {
        // Requête pour récupérer une entrée spécifique par son ID
        $query = "SELECT entry_id, user_id, emotion_id, well_being_score, notes, positive_moment, created_at, isAnonyme 
                  FROM " . $this->table . " WHERE entry_id = :entry_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :entry_id
        $stmt->bindParam(':entry_id', $this->entry_id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner une seule entrée sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour lire une entrée spécifique par son ID
    public function readAllByUser()
    {
        // Requête pour récupérer une entrée spécifique par son ID
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :entry_id
        $stmt->bindParam(':user_id', $this->user_id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner une seule entrée sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Méthode pour mettre à jour une entrée
    public function update()
    {
        // Vérification du score de bien-être (doit être entre 1 et 5)
        if ($this->well_being_score < 1 || $this->well_being_score > 5) {
            return false; // Retourne faux si le score est en dehors de la plage valide
        }

        // Requête pour mettre à jour une entrée existante
        $query = "UPDATE " . $this->table . " 
                  SET user_id = :user_id, emotion_id = :emotion_id, well_being_score = :well_being_score, 
                      notes = :notes, positive_moment = :positive_moment, isAnonyme = :isAnonyme 
                  WHERE entry_id = :entry_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':emotion_id', $this->emotion_id);
        $stmt->bindParam(':well_being_score', $this->well_being_score);
        $stmt->bindParam(':notes', $this->notes);
        $stmt->bindParam(':positive_moment', $this->positive_moment);
        $stmt->bindParam(':isAnonyme', $this->isAnonyme);
        $stmt->bindParam(':entry_id', $this->entry_id);

        // Exécuter la requête et vérifier si la mise à jour a réussi
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour supprimer une entrée
    public function delete()
    {
        // Requête pour supprimer une entrée par son ID
        $query = "DELETE FROM " . $this->table . " WHERE entry_id = :entry_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :entry_id
        $stmt->bindParam(':entry_id', $this->entry_id);

        // Exécuter la requête et vérifier si la suppression a réussi
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour vérifier si une entrée existe déjà pour un utilisateur et une émotion donnés
    public function checkIfEntryExists()
    {
        $query = "SELECT entry_id FROM " . $this->table . " 
                  WHERE user_id = :user_id AND emotion_id = :emotion_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':emotion_id', $this->emotion_id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner vrai si l'entrée existe déjà
        return $stmt->rowCount() > 0;
    }
}
