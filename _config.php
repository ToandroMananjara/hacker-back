<?php
class MyAutoload
{
    public static function  start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER["DOCUMENT_ROOT"];
        $host = $_SERVER["HTTP_HOST"];

        define('HOST', 'http://' . $host . '/hacker-back-main/');
        define('ROOT', $root . '/hacker-back-main/');

        define('CONTROLLER', ROOT . 'controller/');
        define('VIEW', ROOT . 'view/');
        define('MODEL', ROOT . 'model/');
        define('CLASSES', ROOT . 'classes/');
        define('CONFIG', ROOT . 'config/');
    }

    public static function autoload($class)
    {
        if (file_exists(MODEL . $class . '.php')) {
            include(MODEL . $class . '.php');
        } else if (file_exists(CONTROLLER . $class . '.php')) {
            include(CONTROLLER . $class . '.php');
        } else if (file_exists(CLASSES . $class . '.php')) {
            include(CLASSES . $class . '.php');
        } else if (file_exists(CONFIG . $class . '.php')) {
            include(CONFIG . $class . '.php');
        }
    }
}
