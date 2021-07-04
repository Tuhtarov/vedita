<?php
// FRONT CONTROLLER

// 1. общие настройки
// 1.1. отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. подключение файлов
define('ROOT', dirname(__FILE__));
require_once ROOT . '/app/Components/Router.php';
require_once ROOT . '/app/Components/Database.php';

// 4. запуск работы роутера
$router = new Router();
$router->run();

