<?php
class Users
{
    private $table = "users";
    private $connexion = null;

    public $id;
    public $username;
    public $email;
    public $password;   // Le mot de passe haché
    public $created_at;
    public $role;

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Méthode pour créer un utilisateur
    public function create()
    {
        // Hacher le mot de passe avant de l'enregistrer
        // $hashed_password = password_hash($this->password_hash, PASSWORD_DEFAULT);

        // Requête SQL pour insérer un utilisateur
        $query = "INSERT INTO " . $this->table . " (username, email, password, role) 
                  VALUES (:username, :email, :password, :role)";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);

        // Exécuter la requête et vérifier si l'insertion a réussi
        if ($stmt->execute()) {
            // Récupérer l'ID du dernier utilisateur inséré
            $this->id = $this->connexion->lastInsertId();
            return $this->id;
        } else {

            return false;
        }
    }

    // Méthode pour lire tous les utilisateurs
    public function read()
    {
        // Requête pour récupérer tous les utilisateurs
        $query = "SELECT id, username, email, created_at, role FROM " . $this->table;

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Exécuter la requête
        $stmt->execute();

        // Retourner tous les utilisateurs sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour lire un utilisateur par son ID
    public function readOne()
    {
        // Requête pour récupérer un utilisateur spécifique par son ID
        $query = "SELECT id, username, email, created_at, role FROM " . $this->table . " WHERE id = :id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :user_id
        $stmt->bindParam(':id', $this->id);

        // Exécuter la requête
        $stmt->execute();

        // Retourner un seul utilisateur sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour un utilisateur
    public function update()
    {
        // Requête pour mettre à jour l'utilisateur
        $query = "UPDATE " . $this->table . " 
                  SET username = :username, email = :email 
                  WHERE id = :id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier les paramètres
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);

        // Exécuter la requête et vérifier si la mise à jour a réussi
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Méthode pour supprimer un utilisateur
    public function delete()
    {
        // Requête pour supprimer un utilisateur
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :user_id
        $stmt->bindParam(':id', $this->id);

        // Exécuter la requête et vérifier si la suppression a réussi
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Méthode pour vérifier si un utilisateur existe déjà par email
    public function checkIfEmailExists()
    {
        $query = "SELECT id FROM " . $this->table . " WHERE email = :email";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :email
        $stmt->bindParam(':email', $this->email);

        // Exécuter la requête
        $stmt->execute();

        // Si un utilisateur existe déjà avec cet email, retourner true
        return $stmt->rowCount() > 0;
    }

    // Méthode pour vérifier le mot de passe de l'utilisateur
    public function verifyPassword($password)
    {
        // Vérifier si le mot de passe fourni correspond au mot de passe haché dans la base de données

    }

    public function isAuthentify($email, $password)
    {
        // Préparer la requête
        $sql = "SELECT * FROM $this->table where email = '$email' and password = '$password'";
        $query = $this->connexion->query($sql);
        $result = $query->fetch(PDO::FETCH_OBJ);
        if ($result) {
            $this->id = $result->id;
            $this->email = $result->email;
            $this->username = $result->username;
            // $this-> = $result->prenom;

            return true;
        } else
            return false;
    }
}
