<?php
class Cache_Class
{
    private static $_instance; // обьект для повторного юзания класаа
    private function __construct(){} // конструктор для ООП в 7
    public static function instance () // Плодим обьекты, если есть обьект игнор, если нет создать
    {
        if(!isset(self::$_instance)) self::$_instance = new self();
        return self::$_instance;
    }
    public function set($id, $data, $lifetime = 3600) // Записать кэш
    {
        $cacheFile = $this->cacheFullName($id); // путь до файла кэша
        file_put_contents($cacheFile, serialize($data)); // пишем в файл функцией без потеструктуры и байтов
        touch($cacheFile, (time() + intval($lifetime))); // Время прикоснуться к файлу + дата создания
        if(!is_file(CACHE_ROOT.DS.'cache_clean'))
        {
            file_put_contents(CACHE_ROOT.DS.'cache_clean', '');
            touch(CACHE_ROOT.DS.'cache_clean' ,(time() + intval(Config::instance()->get('cache_lifetime'))));
        }
    }
    public function get($id) // Получение кэша или его очистка
    {
        if(is_file(CACHE_ROOT.DS.'cache_clean') AND filemtime(CACHE_ROOT.DS.'cache_clean') < time()) $this->clean();
        //$cacheFile = $this->cacheFullName($id); # по id получаем полное имя файла
        /*if (file_exists($cacheFile))
        {
            if(filemtime($cacheFile) < time()) $this->delete($id);
            else return unserialize(file_get_contents($cacheFile));
        }
        return false;*/
        return file_exists($this->cacheFullName($id)) && filemtime($this->cacheFullName($id)) < time() ? $this->delete($id) : unserialize(file_get_contents($this->cacheFullName($id)));
    }
    public function delete($id) // удалить кэш
    {
        //$cacheFile = $this->cacheFullName($id);
       return unlink($this->cacheFullName($id));
    }
    private function cacheFullName($id) // Узнать полный путь
    {
        return CACHE_ROOT.DS.rawurlencode($id).'.cache';
    }
    public function clean() // Очистка кэша
    {
        $files = scandir(CACHE_ROOT);
        foreach ($files as $file)
        {
            if (($file !== '.' ) AND ($file !== '..')) unlink(CACHE_ROOT.DS.$file);
        }
    }
}
