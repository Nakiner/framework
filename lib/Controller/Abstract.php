<?php

abstract class Controller_Abstract
{
    public function __construct(){}
    final public function redirect($url = '')
    {
        $appBaseUrl = config::instance()->get('base_uri'); // базовый путь
        $url = "{$appBaseUrl}{$url}"; // путь, куда кинем
        header("Location: {$url}"); // Перекидываем
        echo "<div>Нажмите эту ссылку: <a href=\"{$url}\">Ссылка</a></div>";
        exit(); // завершаем скрипт
    }
    final public function loadView($layout = 'default', $view = '') // загрузить вью
    {
        return new View_Class($layout,$view); // Возврат обьекта класса вьюхи
    }
}