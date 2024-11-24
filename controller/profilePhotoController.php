<?php
class ProfilePhotoController
{
    public function __construct() {}

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_id = $_GET['user_id'];

            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $user = new Users($conn);
                $reactComment = new ReactionComments($conn);
                $about = new About($conn);
                $entries = new Entries($conn);
                $coverPhoto = new CoverPhoto($conn);
                $profilePhoto = new ProfilePhoto($conn);

                // $follow = new Follow($conn);
                $user->id = $user_id;
                $userCurrent = $user->readOne();

                $about->user_id = $user_id;
                $aboutUserCurrent = $about->readOne();

                $entries->user_id = $user_id;
                $allPosts  = $entries->readAllByUser();

                // $about->id;
                if ($userCurrent) {
                    echo json_encode([
                        'status' => 'success',
                        'user' => $userCurrent,
                        'about' => $aboutUserCurrent,
                        'posts' => $allPosts ? $allPosts : [],

                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    public function getPhotoByUserId()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_id = $_GET['user_id'];

            try {
                $db = new Database();
                $conn = $db->getConnexion();

                $profilePhoto = new ProfilePhoto($conn);
                $profilePhoto->user_id = $user_id;
                // $follow = new Follow($conn);
                $myPhotoProfile = $profilePhoto->readByUserId();
                // $about->id;
                if ($myPhotoProfile) {
                    echo json_encode([
                        'status' => 'success',
                        'user_id' => $user_id,
                        'path' => $myPhotoProfile['photo_path'],


                    ], JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                }
            } catch (PDOException $e) {
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
    public function createPhotoProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $db = new Database();
                $conn = $db->getConnexion();

                // Assurez-vous que l'ID de l'utilisateur est transmis, probablement via un token ou une session
                $userId = $_POST['user_id'];  // Par exemple, récupérer l'ID de l'utilisateur depuis la requête

                // Vérification si un fichier est bien téléchargé
                if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] === UPLOAD_ERR_OK) {
                    // Récupérer les informations du fichier
                    $file = $_FILES['profilePhoto'];
                    $fileName = $file['name'];
                    $fileTmpPath = $file['tmp_name'];
                    $fileSize = $file['size'];
                    $fileError = $file['error'];
                    $fileType = $file['type'];

                    // Définir les extensions acceptées et la taille maximale du fichier
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];  // Types d'images autorisées
                    $maxFileSize = 5 * 1024 * 1024; // 5MB maximum

                    // Vérification de la taille du fichier
                    if ($fileSize > $maxFileSize) {
                        throw new Exception("Le fichier est trop volumineux. La taille maximale est de 5 Mo.");
                    }

                    // Vérification du type du fichier
                    if (!in_array($fileType, $allowedTypes)) {
                        throw new Exception("Type de fichier non autorisé. Seules les images JPEG, PNG et GIF sont autorisées.");
                    }

                    // Créer un dossier pour l'utilisateur si nécessaire
                    $uploadDir = 'users/' . $userId . '/profilePhoto';
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);  // Crée le dossier avec les permissions appropriées
                    }

                    // Créer un nom unique pour l'image pour éviter les conflits de nom
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $newFileName = uniqid() . '.' . $fileExtension;  // Nouveau nom de fichier unique
                    $destination = $uploadDir . '/' . $newFileName;

                    // Déplacer le fichier téléchargé vers le dossier cible
                    if (!move_uploaded_file($fileTmpPath, $destination)) {
                        throw new Exception("Une erreur est survenue lors de l'enregistrement de la photo de profil.");
                    }

                    // Mettre à jour le chemin de la photo de profil dans la base de données
                    $profilePhoto = new ProfilePhoto($conn);
                    $profilePhoto->user_id = $userId;
                    $profilePhoto->photo_path = $destination;

                    // Enregistrer le chemin dans la base de données (assurez-vous que la méthode insert() est définie dans la classe ProfilePhoto)
                    if (!$profilePhoto->create()) {
                        throw new Exception("Une erreur est survenue lors de l'enregistrement du chemin dans la base de données.");
                    }

                    // Répondre avec un message de succès
                    echo json_encode(['status' => 'success', 'message' => 'Photo de profil téléchargée avec succès.', 'photo_path' => $destination], JSON_UNESCAPED_UNICODE);
                } else {
                    throw new Exception("Aucun fichier téléchargé ou erreur dans le téléchargement.");
                }
            } catch (Exception $e) {
                // Gérer les erreurs
                http_response_code(400);
                echo json_encode(['status' => 'failed', 'error' => 'Bad request', 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
