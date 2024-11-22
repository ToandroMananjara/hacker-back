<?php
class Notifications
{
    private $table = "notification"; // Nom de la table
    private $connexion = null; // Connexion PDO

    public $id;
    public $actor_id;
    public $user_id;
    public $type;
    public $is_read;
    public $create_at;

    public function __construct($conn)
    {
        // Initialiser la connexion PDO
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }
    /// nasoriko ny create 
    // Méthode pour lire toutes es notifications
    public function read()
    {
        $query = "SELECT n.id, n.actor_id, n.user_id, n.type, n.is_read, n.create_at, u.username 
                  FROM " . $this->table . " n
                  JOIN users u ON n.actor_id = u.id";

        $stmt = $this->connexion->prepare($query);
        $stmt->execute();

        $notifications = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $postId = null;
            $postOwner = null;
            $signalementId = null;

            // Récupérer les informations supplémentaires selon le type
            switch ($row['type']) {
                case 'new_post':
                    $postQuery = "SELECT id FROM posts WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
                    $postStmt = $this->connexion->prepare($postQuery);
                    $postStmt->execute([$row['actor_id']]);
                    if ($postRow = $postStmt->fetch(PDO::FETCH_ASSOC)) {
                        $postId = $postRow['id'];
                    }
                    break;

                case 'comment':
                    $commentQuery = "SELECT post_id FROM comments WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
                    $commentStmt = $this->connexion->prepare($commentQuery);
                    $commentStmt->execute([$row['actor_id']]);
                    if ($commentRow = $commentStmt->fetch(PDO::FETCH_ASSOC)) {
                        $postId = $commentRow['post_id'];
                    }
                    break;

                case 'reaction':
                    $reactionQuery = "SELECT post_id FROM post_reactions WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
                    $reactionStmt = $this->connexion->prepare($reactionQuery);
                    $reactionStmt->execute([$row['actor_id']]);
                    if ($reactionRow = $reactionStmt->fetch(PDO::FETCH_ASSOC)) {
                        $postId = $reactionRow['post_id'];
                    }
                    break;

                case 'comment_reaction':
                    $commentReactionQuery = "SELECT c.post_id, p.user_id AS post_owner 
                                           FROM comments c 
                                           JOIN comment_reactions cr ON c.id = cr.comment_id 
                                           JOIN posts p ON c.post_id = p.id 
                                           WHERE cr.user_id = ? 
                                           ORDER BY cr.created_at DESC LIMIT 1";
                    $commentReactionStmt = $this->connexion->prepare($commentReactionQuery);
                    $commentReactionStmt->execute([$row['actor_id']]);
                    if ($commentReactionRow = $commentReactionStmt->fetch(PDO::FETCH_ASSOC)) {
                        $postId = $commentReactionRow['post_id'];
                        $postOwner = $commentReactionRow['post_owner'];
                    }
                    break;

                case 'signalement':
                    $signalementQuery = "SELECT id FROM signalements WHERE created_at = ? ORDER BY created_at DESC LIMIT 1";
                    $signalementStmt = $this->connexion->prepare($signalementQuery);
                    $signalementStmt->execute([$row['create_at']]);
                    if ($signalementRow = $signalementStmt->fetch(PDO::FETCH_ASSOC)) {
                        $signalementId = $signalementRow['id'];
                    }
                    break;
            }

            $notifications[] = [
                'id' => $row['id'],
                'user_id' => $row['user_id'],
                'actor_id' => $row['actor_id'],
                'username' => $row['username'],
                'type' => $row['type'],
                'is_read' => $row['is_read'],
                'created_at' => $row['create_at'],
                'signalement_id' => $signalementId,
                'post_id' => $postId,
                'post_owner' => $postOwner
            ];
        }

        return $notifications;
    }

    // Méthode pour lire une notification spécifique par son ID
    // public function readOne()
    // {
    //     $query = "SELECT id, actor_id, user_id, type, is_read, create_at 
    //               FROM " . $this->table . " 
    //               WHERE id = :id";

    //     $stmt = $this->connexion->prepare($query);
    //     $stmt->bindParam(':id', $this->id);
    //     $stmt->execute();

    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // Méthode pour mettre à jour une notification
    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET is_read = 1 
                  WHERE user_id = :user_id";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            // Récupérer toutes les notifications après la mise à jour
            $selectQuery = "SELECT n.id, n.actor_id, n.user_id, n.type, n.is_read, n.create_at, u.username 
                           FROM " . $this->table . " n
                           JOIN users u ON n.actor_id = u.id 
                           WHERE n.user_id = :user_id";

            $selectStmt = $this->connexion->prepare($selectQuery);
            $selectStmt->bindParam(':user_id', $this->user_id);
            $selectStmt->execute();

            $notifications = [];
            while ($row = $selectStmt->fetch(PDO::FETCH_ASSOC)) {
                $postId = null;
                $postOwner = null;
                $signalementId = null;

                switch ($row['type']) {
                    case 'new_post':
                        $postQuery = "SELECT id FROM posts WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
                        $postStmt = $this->connexion->prepare($postQuery);
                        $postStmt->execute([$row['actor_id']]);
                        if ($postRow = $postStmt->fetch(PDO::FETCH_ASSOC)) {
                            $postId = $postRow['id'];
                        }
                        break;

                    case 'comment':
                        $commentQuery = "SELECT post_id FROM comments WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
                        $commentStmt = $this->connexion->prepare($commentQuery);
                        $commentStmt->execute([$row['actor_id']]);
                        if ($commentRow = $commentStmt->fetch(PDO::FETCH_ASSOC)) {
                            $postId = $commentRow['post_id'];
                        }
                        break;

                    case 'reaction':
                        $reactionQuery = "SELECT post_id FROM post_reactions WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
                        $reactionStmt = $this->connexion->prepare($reactionQuery);
                        $reactionStmt->execute([$row['actor_id']]);
                        if ($reactionRow = $reactionStmt->fetch(PDO::FETCH_ASSOC)) {
                            $postId = $reactionRow['post_id'];
                        }
                        break;

                    case 'comment_reaction':
                        $commentReactionQuery = "SELECT c.post_id, p.user_id AS post_owner 
                                               FROM comments c 
                                               JOIN comment_reactions cr ON c.id = cr.comment_id 
                                               JOIN posts p ON c.post_id = p.id 
                                               WHERE cr.user_id = ? 
                                               ORDER BY cr.created_at DESC LIMIT 1";
                        $commentReactionStmt = $this->connexion->prepare($commentReactionQuery);
                        $commentReactionStmt->execute([$row['actor_id']]);
                        if ($commentReactionRow = $commentReactionStmt->fetch(PDO::FETCH_ASSOC)) {
                            $postId = $commentReactionRow['post_id'];
                            $postOwner = $commentReactionRow['post_owner'];
                        }
                        break;

                    case 'signalement':
                        $signalementQuery = "SELECT id FROM signalements WHERE created_at = ? ORDER BY created_at DESC LIMIT 1";
                        $signalementStmt = $this->connexion->prepare($signalementQuery);
                        $signalementStmt->execute([$row['create_at']]);
                        if ($signalementRow = $signalementStmt->fetch(PDO::FETCH_ASSOC)) {
                            $signalementId = $signalementRow['id'];
                        }
                        break;
                }

                $notifications[] = [
                    'id' => $row['id'],
                    'user_id' => $row['user_id'],
                    'actor_id' => $row['actor_id'],
                    'username' => $row['username'],
                    'type' => $row['type'],
                    'is_read' => $row['is_read'],
                    'created_at' => $row['create_at'],
                    'signalement_id' => $signalementId,
                    'post_id' => $postId,
                    'post_owner' => $postOwner
                ];
            }

            return $notifications;
        }

        return false;
    }

    // Méthode pour supprimer une notification
  // tss delete 
    // Méthode pour marquer une notification comme lue
    // public function markAsRead()
    // {
    //     $query = "UPDATE " . $this->table . " 
    //               SET is_read = 1 
    //               WHERE id = :id";

    //     $stmt = $this->connexion->prepare($query);
    //     $stmt->bindParam(':id', $this->id);

    //     return $stmt->execute();
    // }

    // Méthode pour récupérer les notifications non lues d'un utilisateur
    public function CountUnreadNotifications()
    {
        // $query = "SELECT id, actor_id, user_id, type, is_read, create_at 
        //           FROM " . $this->table . " 
        //           WHERE user_id = :user_id AND is_read = 0 
        //           ORDER BY create_at DESC";

        // $stmt = $this->connexion->prepare($query);
        // $stmt->bindParam(':user_id', $this->user_id);
        // $stmt->execute();

        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $query = "SELECT COUNT(*) as unread_count 
                  FROM " . $this->table . " 
                  WHERE user_id = :user_id AND is_read = 0";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['unread_count'];
        
    }
}
