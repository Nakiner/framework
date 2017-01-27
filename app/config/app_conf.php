<?php
error_reporting(E_ALL ^ E_NOTICE); // вывод ошибок
$cnf = Config::instance(); // обьект класса
$cnf->set('base_uri',''); // базовый путь прил.
$cnf->set('dev_mode',0); // реж раз-ки
$cnf->set('view_ext','.php'); // расширение
$cnf->set('default_layout','default'); // дефолтный шаблон при пустом параметре
$cnf->set('qz_output',1); // ob_start во viewclass
$cnf->set('errors_in_files',1); // запись ошибок в файлы
$cnf->set('cache_lifetime',60*60*24); // жизнь кеша
unset($cnf); // del $cnf