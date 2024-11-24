<?php
class Router
{
    private $request;
    private $routes = [
        // Routes pour la gestion des utilisateurs
        'user' => ['controller' => 'user', 'action' => 'index'], // Afficher tous les utilisateurs
        'user/create' => ['controller' => 'user', 'action' => 'createUser'], // Créer un nouvel utilisateur
        'user/delete' => ['controller' => 'user', 'action' => 'deleteUser'], // Supprimer un utilisateur
        'user/update' => ['controller' => 'user', 'action' => 'updateUser'], // Mettre à jour un utilisateur

        // Routes pour la gestion des publications
        'posts' => ['controller' => 'postController', 'action' => 'index'], // Afficher toutes les publications
        'posts/create' => ['controller' => 'postController', 'action' => 'createPost'], // Créer une nouvelle publication
        'posts/delete' => ['controller' => 'postController', 'action' => 'deletePost'], // Supprimer une publication
        'posts/update' => ['controller' => 'postController', 'action' => 'updatePost'], // Mettre à jour une publication

        // Routes pour l'authentification
        'signIn' => ['controller' => 'signIn', 'action' => 'authenticate'], // Authentifier un utilisateur
        'signUp' => ['controller' => 'signUp', 'action' => 'index'], // S'inscrire en tant qu'utilisateur
        'logout' => ['controller' => 'deconnexion', 'action' => 'logout'], // Déconnecter un utilisateur

        // Routes pour les réactions aux publications
        'react' => ['controller' => 'reactPostController', 'action' => 'reactPost'], // Réagir à une publication
        'emotion' => ['controller' => 'emotionController', 'action' => 'index'], // Afficher les types d'émotions

        // Routes pour la gestion des commentaires
        'comment/create' => ['controller' => 'commentController', 'action' => 'addComment'], // Ajouter un commentaire
        'comment/delete' => ['controller' => 'commentController', 'action' => 'deleteComment'], // Supprimer un commentaire
        'comment/react' => ['controller' => 'reactCommentController', 'action' => 'reactComment'], // Réagir à un commentaire

        // Routes pour la page "À propos"
        'about' => ['controller' => 'aboutController', 'action' => 'index'], // Afficher la page "À propos"
        'about/create' => ['controller' => 'aboutController', 'action' => 'createAbout'], // Ajouter une section "À propos"
        'about/update' => ['controller' => 'aboutController', 'action' => 'updateAbout'], // Mettre à jour une section "À propos"

        // Routes pour la gestion des profils et des photos
        'profile' => ['controller' => 'profileController', 'action' => 'index'], // Afficher les informations du profil
        'createProfilePhoto' => ['controller' => 'profilePhotoController', 'action' => 'createProfilePhoto'], // Ajouter une photo de profil
        'createCoverPhoto' => ['controller' => 'coverPhotoController', 'action' => 'createCoverPhoto'], // Ajouter une photo de couverture
        'profilePhoto' => ['controller' => 'profilePhotoController', 'action' => 'getPhotoByUserId'], // Ajouter une photo de profil



        // Routes pour les notifications
        'notifications' => ['controller' => 'notificationController', 'action' => 'getNotifications'], // Récupérer les notifications
        'notifications/markAsRead' => ['controller' => 'notificationController', 'action' => 'markAsRead'], // Marquer les notifications comme lues
        'notifications/count' => ['controller' => 'notificationController', 'action' => 'countUnread'], // Compter les notifications non lues

        // Routes pour la gestion des relations utilisateur (amis, abonnements)
        'user/follow' => ['controller' => 'followerController', 'action' => 'follow'], // Suivre un utilisateur
        'user/unfollow' => ['controller' => 'followerController', 'action' => 'unfollow'], // Se désabonner d'un utilisateur
        'user/allfriend' => ['controller' => 'followerController', 'action' => 'allFriend'], // Afficher tous les amis d'un utilisateur

        // Routes pour les signalements
        'signalement' => ['controller' => 'signalementController', 'action' => 'index'], // Afficher tous les signalements
        'signalement/createSignalement' => ['controller' => 'signalementController', 'action' => 'createSignalement'], // Creation de  signalement

        // Routes pour les évaluations
        'evaluation' => ['controller' => 'evaluationController', 'action' => 'index'], // Afficher les évaluations

        // Routes pour les plaintes
        'complaint' => ['controller' => 'complaintController', 'action' => 'index'], // Gérer les plaintes

        // Routes pour les messages
        'message' => ['controller' => 'privateMessageController', 'action' => 'index'], // Gérer les plaintes

    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        $request = $this->request;

        if (array_key_exists($request, $this->routes)) {
            $route = $this->routes[$request];  // Utilisation de $this->routes pour accéder aux routes

            // Instanciation du contrôleur
            $controller = new $route['controller']();

            // Appel de l'action associée
            $controller->{$route['action']}();
        } else {
            echo "Page not found";
        }
    }
}
