<?php
class Router
{
    private $request;
    private $routes = [
        'users' => ['controller' => 'user', 'action' => 'index'],
        'users/create' => ['controller' => 'user', 'action' => 'createUser'],
        'users/delete' => ['controller' => 'user', 'action' => 'deleteUser'],
        'users/update' => ['controller' => 'user', 'action' => 'updateUser'],

        'posts' => ['controller' => 'post', 'action' => 'index'],
        'posts/create' => ['controller' => 'post', 'action' => 'createPost'],
        'posts/delete' => ['controller' => 'post', 'action' => 'deletePost'],
        'posts/update' => ['controller' => 'user', 'action' => 'updatePost'],

        'signIn' => ['controller' => 'signIn', 'action' => 'authenticate'],
        'signUp' => ['controller' => 'signUp', 'action' => 'index'],
        'logout' => ['controller' => 'deconnexion', 'action' => 'logout'],


        'react' => ['controller' => 'reactPost', 'action' => 'reactPost'],
        'comment' => ['controller' => 'reactPost', 'action' => 'reactPost'],

        'about/' => ['controller' => 'aboutController', 'action' => 'index'],

        'about/create' => ['controller' => 'aboutController', 'action' => 'createAbout'],
        'about/update' => ['controller' => 'aboutController', 'action' => 'updateAbout'],

        'notifications' => ['controller' => 'notification', 'action' => 'index'],
        'notifications/read' => ['controller' => 'notification', 'action' => 'getNotifications'],
        'notifications/count' => ['controller' => 'notification', 'action' => 'countUnread'],

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
