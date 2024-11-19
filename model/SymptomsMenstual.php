<?php
class SymptomsMenstrual
{
    private $table = "symptomsMenstrual";
    private $connexion = null;

    public $symptom_id;
    public $name;

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Méthode pour créer un nouveau symptôme
    public function create()
    {
        // Requête SQL pour insérer un nouveau symptôme
        $query = "INSERT INTO " . $this->table . " (name) 
                  VALUES (:name)";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :name
        $stmt->bindParam(':name', $this->name);

        // Exécuter la requête et vérifier si l'insertion a réussi
        if ($stmt->execute()) {
            // Récupérer l'ID du dernier symptôme inséré
            $this->symptom_id = $this->connexion->lastInsertId();
            return true;
        }

        return false;
    }

    // Méthode pour lire tous les symptômes
    public function read()
    {
        // Requête pour récupérer tous les symptômes
        $query = "SELECT symptom_id, name FROM " . $this->table;

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Exécuter la requête
        $stmt->execute();

        // Retourner tous les symptômes sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour lire un symptôme spécifique par son ID
    public function readOne()
    {
        // Requête pour récupérer un symptôme spécifique par son ID
        $query = "SELECT symptom_id, name FROM " . $this->table . " WHERE symptom_id = :symptom_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :symptom_id
        $stmt->bindParam(':symptom_id', $this->symptom_id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner un seul symptôme sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour un symptôme
    public function update()
    {
        // Requête pour mettre à jour un symptôme existant
        $query = "UPDATE " . $this->table . " 
                  SET name = :name 
                  WHERE symptom_id = :symptom_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':symptom_id', $this->symptom_id);

        // Exécuter la requête et vérifier si la mise à jour a réussi
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour supprimer un symptôme
    public function delete()
    {
        // Requête pour supprimer un symptôme par son ID
        $query = "DELETE FROM " . $this->table . " WHERE symptom_id = :symptom_id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :symptom_id
        $stmt->bindParam(':symptom_id', $this->symptom_id);

        // Exécuter la requête et vérifier si la suppression a réussi
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Méthode pour vérifier si un symptôme existe déjà
    public function checkIfSymptomExists()
    {
        $query = "SELECT symptom_id FROM " . $this->table . " 
                  WHERE name = :name";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :name
        $stmt->bindParam(':name', $this->name);

        // Exécuter la requête
        $stmt->execute();

        // Retourner vrai si un symptôme existe déjà avec ce nom
        return $stmt->rowCount() > 0;
    }
}
