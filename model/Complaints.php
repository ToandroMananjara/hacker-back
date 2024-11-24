
<?php

class Complaints
{
    private $connexion; // PDO database connection
    private $table = "security_complaints";

    public $id;
    public $signalement_id;
    public $responsible_service;
    public $next_step;
    public $next_date;
    public $current_status;
    public $service_comments;
    public $created_at;
    public $updated_at;
    public $priority;

    public function __construct($conn)
    {
        $this->connexion = $conn;
    }

    // 1. Create a new complaint
    public function create()
    {
        $query = "INSERT INTO $this->table (
            signalement_id, responsible_service, next_step, next_date, 
            current_status, service_comments, priority, created_at, updated_at
        ) VALUES (
            :signalement_id, :responsible_service, :next_step, :next_date, 
            :current_status, :service_comments, :priority, NOW(), NOW()
        )";

        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(":signalement_id", $this->signalement_id);
        $stmt->bindParam(":responsible_service", $this->responsible_service);
        $stmt->bindParam(":next_step", $this->next_step);
        $stmt->bindParam(":next_date", $this->next_date);
        $stmt->bindParam(":current_status", $this->current_status);
        $stmt->bindParam(":service_comments", $this->service_comments);
        $stmt->bindParam(":priority", $this->priority);

        return $stmt->execute();
    }

    // 2. Read all complaints
    public function readAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY created_at DESC";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. Read a single complaint by ID
    public function readOne()
    {
        $query = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 4. Update an existing complaint
    public function update()
    {
        $query = "UPDATE $this->table SET
            signalement_id = :signalement_id,
            responsible_service = :responsible_service,
            next_step = :next_step,
            next_date = :next_date,
            current_status = :current_status,
            service_comments = :service_comments,
            priority = :priority,
            updated_at = NOW()
            WHERE id = :id";

        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":signalement_id", $this->signalement_id);
        $stmt->bindParam(":responsible_service", $this->responsible_service);
        $stmt->bindParam(":next_step", $this->next_step);
        $stmt->bindParam(":next_date", $this->next_date);
        $stmt->bindParam(":current_status", $this->current_status);
        $stmt->bindParam(":service_comments", $this->service_comments);
        $stmt->bindParam(":priority", $this->priority);

        return $stmt->execute();
    }

    // 5. Delete a complaint
    public function delete()
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // 6. Filter complaints by status
    public function filterByStatus($status)
    {
        $query = "SELECT * FROM $this->table WHERE current_status = :current_status ORDER BY created_at DESC";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":current_status", $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 7. Count complaints by priority
    public function countByPriority()
    {
        $query = "SELECT priority, COUNT(*) AS total FROM $this->table GROUP BY priority";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 8. Retrieve complaints by date range
    public function filterByDateRange($startDate, $endDate)
    {
        $query = "SELECT * FROM $this->table WHERE created_at BETWEEN :start_date AND :end_date ORDER BY created_at DESC";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":start_date", $startDate);
        $stmt->bindParam(":end_date", $endDate);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 9. Mark complaint as resolved
    public function markAsResolved()
    {
        $query = "UPDATE $this->table SET current_status = 'resolved', updated_at = NOW() WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    // 10. Fetch the latest complaint
    public function getLatest()
    {
        $query = "SELECT * FROM $this->table ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>

    