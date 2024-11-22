<?php
class Comments
{
    private $table = "comment"; // Nom de la table
    private $connexion = null; // Connexion à la base de données

    public $id; // ID du commentaire
    public $post_id; // ID du post associé
    public $user_id; // ID de l'utilisateur ayant créé le commentaire
    public $content; // Contenu du commentaire
    public $create_at; // Date de création

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }

    // Créer un nouveau commentaire
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (post_id, user_id, content, create_at) VALUES (:post_id, :user_id, :content, NOW())";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':post_id', $this->post_id);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':content', $this->content);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lire tous les commentaires
    public function read()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY create_at DESC";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Lire un seul commentaire par son ID
    public function readSingle()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
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
        $query = "SELECT user_id FROM posts WHERE id = :postId";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':postId', $this->post_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function updateCommentCount()
    {
        $query = "UPDATE posts SET comment_count = (SELECT COUNT(*) FROM comments WHERE post_id = :postId) WHERE id = :postId";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':postId', $this->post_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
