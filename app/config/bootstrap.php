<?php
$includePath = array(LIB_PATH, APP_PATH.DS.'classes', get_include_path()); // Где искать инклюды и установка пути
$includePath = implode(PATH_SEPARATOR,$includePath);
set_include_path($includePath);
require_once 'PEAR'.DS.'NameScheme'.DS.'Autoload.php'; // подгруз загрузчика имен классов и обьектов
include_once APP_PATH . DS . 'config' . DS . 'app_conf.php'; // cfg приложения
include_once APP_PATH . DS . 'config' . DS . 'routes.php'; // Роуты
include_once LIB_PATH.DS.'function.php'; // Функции
include_once APP_PATH . DS . 'config' . DS . 'db_conf.php'; // cfg БД
$router = Routing_Router::instance(); // Обьект класса роутинга
$route = $router->getRoute($_SERVER['REQUEST_URI']); // Получить текущий путь
errorReporting(); // вывод ошибок 0
dispatch($route); // запускаем пути