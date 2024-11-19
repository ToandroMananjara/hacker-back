<?php
class Symptom_tips
{
    private $table = "symptom_tips";
    private $connexion = null;

    public $tip_id;
    public $symptom_id;
    public $advice;

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Méthode pour créer un conseil
    public function create()
    {
        // Requête SQL pour insérer un nouveau conseil
        $query = "INSERT INTO " . $this->table . " (symptom_id, advice) 
                  VALUES (:symptom_id, :advice)";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':symptom_id', $this->symptom_id);
        $stmt->bindParam(':advice', $this->advice);

        // Exécuter la requête et vérifier si l'insertion a réussi
        if ($stmt->execute()) {
            // Récupérer l'ID de la dernière entrée insérée
            $this->tip_id = $this->connexion->lastInsertId();
            return true;
        }

        return false;
    }

    // Méthode pour lire tous les conseils
    public function read()
    {
        // Requête pour récupérer tous les conseils
        $query = "SELECT tip_id, symptom_id, advice FROM " . $this->table;

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Exécuter la requête
        $stmt->execute();

        // Retourner tous les conseils sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour lire un conseil spécifique par son ID
    public function readOne()
    {
        // Requête pour récupérer un conseil spécifique par son ID
        $query = "SELECT tip_id, symptom_id, advice FROM " . $this->table . " WHERE tip_id = :tip_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :tip_id
        $stmt->bindParam(':tip_id', $this->tip_id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner un seul conseil sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour un conseil
    public function update()
    {
        // Requête pour mettre à jour un conseil existant
        $query = "UPDATE " . $this->table . " 
                  SET symptom_id = :symptom_id, advice = :advice 
                  WHERE tip_id = :tip_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':symptom_id', $this->symptom_id);
        $stmt->bindParam(':advice', $this->advice);
        $stmt->bindParam(':tip_id', $this->tip_id);

        // Exécuter la requête et vérifier si la mise à jour a réussi
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour supprimer un conseil
    public function delete()
    {
        // Requête pour supprimer un conseil par son ID
        $query = "DELETE FROM " . $this->table . " WHERE tip_id = :tip_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :tip_id
        $stmt->bindParam(':tip_id', $this->tip_id);

        // Exécuter la requête et vérifier si la suppression a réussi
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour vérifier si un conseil existe pour un symptôme donné
    public function checkIfTipExists()
    {
        $query = "SELECT tip_id FROM " . $this->table . " 
                  WHERE symptom_id = :symptom_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :symptom_id
        $stmt->bindParam(':symptom_id', $this->symptom_id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner vrai si un conseil existe déjà pour ce symptôme
        return $stmt->rowCount() > 0;
    }
}
