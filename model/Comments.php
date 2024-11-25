<?php
class Comments
{
    private $table = "comments"; // Nom de la table
    private $connexion = null; // Connexion à la base de données

    public $id; // ID du commentaire
    public $entry_id; // ID du post associé
    public $user_id; // ID de l'utilisateur ayant créé le commentaire
    public $content; // Contenu du commentaire
    public $created_at; // Date de création

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Créer un nouveau commentaire
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (entry_id, user_id, content) VALUES (:entry_id, :user_id, :content)";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':content', $this->content);

        if ($stmt->execute()) {
            $this->id = $this->connexion->lastInsertId();
            return $this->id;
        }
        return false;
    }

    // Lire tous les commentaires
    public function read()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }

    // Lire un seul commentaire par son ID
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAllByEntry_id()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE entry_id = :entry_id LIMIT 1";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':entry_id', $this->entry_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Mettre à jour un commentaire
    public function update()
    {
        $query = "UPDATE " . $this->table . " SET content = :content WHERE id = :id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Supprimer un commentaire
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getPostOwner()
    {
        $query = "SELECT user_id FROM entries WHERE entry_id = :postId";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':postId', $this->entry_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function updateCommentCount()
    {
        $query = "UPDATE posts SET comment_count = (SELECT COUNT(*) FROM comments WHERE entry_id = :postId) WHERE id = :postId";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':postId', $this->entry_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function countCommentsForPost()
    {
        $query = "SELECT COUNT(*) FROM comments WHERE entry_id = :postId";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':postId', $this->entry_id, PDO::PARAM_INT);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    // Méthode pour vérifier si un utilisateur existe déjà par email
    public function checkIsCommentExists()
    {
        $query = "SELECT id FROM " . $this->table . " WHERE id = :id";

        // Préparer la requête
        $stmt = $this->connexion->prepare($query);

        // Lier le paramètre :email
        $stmt->bindParam(':id', $this->id);

        // Exécuter la requête
        $stmt->execute();

        // Si un utilisateur existe déjà avec cet email, retourner true
        return $stmt->rowCount() > 0;
    }
}
