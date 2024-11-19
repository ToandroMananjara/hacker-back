<?php
include_once('_config.php');
MyAutoload::start();
$request = isset($_GET['request']) ? $_GET['request'] : '';
if ($request == '') {
    $request = 'connexion';
}
$route = new Router($request);
$route->renderController();
