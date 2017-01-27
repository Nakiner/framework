<?php
$config = Dbconnect::instance(); // Обьект класса конфига
$config->set(array(
    'host' => 'ovl.io',
    'user' => 'framework',
    'pass' => 'framework553',
    'name' => 'framework'
)); // забиваем данные для коннекта
$config->connect(); // Запустили
unset($config); // del $config
