<?php

define('APP_PATH', realpath('../')); //Путь ./app

define('LIB_PATH', realpath('../../lib')); //Путь  /lib

define('DS',DIRECTORY_SEPARATOR); // '/'

define('CACHE_ROOT',APP_PATH.DS.'temp'.DS.'cache'); // /app/temp/cache
define('LOGS_ROOT',APP_PATH.DS.'temp'.DS.'logs'); // /app/temp/logs
define('TEMP',APP_PATH.DS.'temp'); // /app/temp

define('TABLE_PREFIX',''); // префикс таблиц/бд sql
define('SERVER','http://corp11.hol.es/'); // SERVER путь до css,js,img и тп
ini_set('session.cookie_lifetime', 0); // жиза куки

include_once APP_PATH . DS . 'config' . DS . 'bootstrap.php'; // путь о сборщика приложения