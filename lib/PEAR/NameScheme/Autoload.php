<?php
    /*
     * Библиотека автозагрузки
     */

    require_once 'PHP/Autoload.php';
    require_once 'PEAR/NameScheme.php';

    class PEAR_NameScheme_Autoload
    {
        static function classAutoloader($classname) // подгрузчик классов
        {
           return ($f = @fopen(PEAR_NameScheme::name2path($classname), "r", true)) ? fclose($f) && include_once PEAR_NameScheme::name2path($classname): false;
           // Если класс валидный подключаем его, либо возврат 0
        }

    }
    PHP_Autoload::register(array("PEAR_NameScheme_Autoload", "classAutoloader")); // Регистрируем функцию в списке

