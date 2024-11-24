<?php
class SignalementController
{
    public function __construct() {}

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $signalements = new Signalements($conn);


                $getSignalements = $signalements->getAllReports();
                if ($getSignalements) {
                    echo json_encode([
                        'status' => 'success',
                        'data' => $getSignalements

                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function createSignalement()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $input = json_decode(file_get_contents('php://input'), true);

                $user_id = $input['user_id'];
                $full_name = $input['full_name'];
                $date = $input['date'];
                $hour = $input['hour'];
                $location = $input['location'];
                $description = $input['description'];
                $file = $_FILES['file_path'];
                $fileName = $file['name'];
                $fileTmpPath = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];

                $uploadDir = 'users/' . $user_id . '/Signalements';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);  // Crée le dossier avec les permissions appropriées
                }

                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . '.' . $fileExtension;  // Nouveau nom de fichier unique
                $destination = $uploadDir . '/' . $newFileName;

                // Déplacer le fichier téléchargé vers le dossier cible
                if (!move_uploaded_file($fileTmpPath, $destination)) {
                    throw new Exception("Une erreur est survenue lors de l'enregistrement de la photo de profil.");
                }

                $signalements = new Signalements($conn);

                $signalements->full_name = $full_name;
                // $signalements->receiver_id = ;

                $signalements->date = $date;
                $signalements->hour = $hour;
                $signalements->location = $location;
                $signalements->description = $description;
                $signalements->file_path = $destination;

                $isCreate = $signalements->createReport();

                if ($isCreate) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Plainte placé avec succès.',
                    ], JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode([
                        'status' => 'failed',
                        'message' => 'Erreur lors de la soumission de formulaire',
                    ], JSON_UNESCAPED_UNICODE);
                }
                // Assurez-vous que l'ID de l'utilisateur est transmis, probablement via un token ou une session


                // Répondre avec un message de succès

            } catch (Exception $e) {
                // Gérer les erreurs
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
