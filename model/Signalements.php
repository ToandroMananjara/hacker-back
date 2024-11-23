<?php
class Signalements
{
    private $connexion = null; // PDO database connection

    // Public attributes corresponding to the table columns
    public $id;
    public $user_id;
    public $receiver_id;
    public $full_name;
    public $date;
    public $hour;
    public $location;
    public $description;
    public $file_path;
    public $signature_path;
    public $created_at;


    // Constructor to inject PDO object
    public function __construct($conn)
    {
        $this->connexion = $conn;
    }

    // Add a report
    public function addReport()
    {
        $query = "INSERT INTO signalements (user_id, receiver_id, full_name, date, hour, location, description, file_path, signature_path)
                  VALUES (:user_id, :receiver_id, :full_name, :date, :hour, :location, :description, :file_path, :signature_path)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':receiver_id', $this->receiver_id);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':hour', $this->hour);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':file_path', $this->file_path);
        $stmt->bindParam(':signature_path', $this->signature_path);
        return $stmt->execute();
    }

    // Update a report
    public function updateReport()
    {
        $query = "UPDATE signalements 
                  SET full_name = :full_name, date = :date, hour = :hour, location = :location, description = :description, 
                      file_path = :file_path, signature_path = :signature_path
                  WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':hour', $this->hour);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':file_path', $this->file_path);
        $stmt->bindParam(':signature_path', $this->signature_path);
        return $stmt->execute();
    }

    // Delete a report
    public function deleteReport()
    {
        $query = "DELETE FROM signalements WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Get a report by ID
    public function getReport()
    {
        $query = "SELECT * FROM signalements WHERE id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            foreach ($result as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
        return $result;
    }

    // Get all reports
    public function getAllReports()
    {
        $query = "SELECT * FROM signalements";
        $stmt = $this->connexion->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReportByUser()
    {
        $query = "SELECT * FROM signalements WHERE user_id = :user_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}
