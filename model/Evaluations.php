
    <?php

    class Evaluations
    {
        private $connexion = null; // PDO database connection

        public $id;
        public $signalement_id;
        public $user_id;
        public $clarity;
        public $effectiveness;
        public $response_time;
        public $empathy;
        public $comment;
        public $created_at;
        public function __construct($conn)
        {
            $this->connexion = $conn;
        }

        // Récupérer toutes les évaluations (méthode sans paramètres)
        public function readAll()
        {
            $stmt = $this->connexion->prepare("SELECT * FROM evaluations");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Récupérer une évaluation par son ID (méthode sans paramètres)
        public function readOne()
        {
            $stmt = $this->connexion->prepare("SELECT * FROM evaluations WHERE id = :id");
            $stmt->bindParam(':id', $this->id);  // Utilisation de l'attribut $id de la classe
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // On charge les valeurs dans les attributs de l'objet
                $this->signalement_id = $result['signalement_id'];
                $this->user_id = $result['user_id'];
                $this->clarity = $result['clarity'];
                $this->effectiveness = $result['effectiveness'];
                $this->response_time = $result['response_time'];
                $this->empathy = $result['empathy'];
                $this->comment = $result['comment'];
                $this->created_at = $result['created_at'];
            }

            return $result;
        }

        // Créer une nouvelle évaluation (méthode sans paramètres)
        public function create()
        {
            $stmt = $this->connexion->prepare("INSERT INTO evaluations (signalement_id, user_id, clarity, effectiveness, response_time, empathy, comment, created_at) 
                VALUES (:signalement_id, :user_id, :clarity, :effectiveness, :response_time, :empathy, :comment, :created_at)");

            // Lier les attributs de l'objet aux paramètres de la requête SQL
            $stmt->bindParam(':signalement_id', $this->signalement_id);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':clarity', $this->clarity);
            $stmt->bindParam(':effectiveness', $this->effectiveness);
            $stmt->bindParam(':response_time', $this->response_time);
            $stmt->bindParam(':empathy', $this->empathy);
            $stmt->bindParam(':comment', $this->comment);
            $stmt->bindParam(':created_at', $this->created_at);

            return $stmt->execute();
        }

        // Mettre à jour une évaluation existante (méthode sans paramètres)
        public function update()
        {
            $stmt = $this->connexion->prepare("UPDATE evaluations SET signalement_id = :signalement_id, user_id = :user_id, clarity = :clarity, 
                effectiveness = :effectiveness, response_time = :response_time, empathy = :empathy, comment = :comment, created_at = :created_at
                WHERE id = :id");

            // Lier les attributs de l'objet aux paramètres de la requête SQL
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':signalement_id', $this->signalement_id);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':clarity', $this->clarity);
            $stmt->bindParam(':effectiveness', $this->effectiveness);
            $stmt->bindParam(':response_time', $this->response_time);
            $stmt->bindParam(':empathy', $this->empathy);
            $stmt->bindParam(':comment', $this->comment);
            $stmt->bindParam(':created_at', $this->created_at);

            return $stmt->execute();
        }

        // Supprimer une évaluation (méthode sans paramètres)
        public function delete()
        {
            $stmt = $this->connexion->prepare("DELETE FROM evaluations WHERE id = :id");
            $stmt->bindParam(':id', $this->id); // Utilisation de l'attribut $id de la classe
            return $stmt->execute();
        }
    }
    ?>
    