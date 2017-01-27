<?php
class Dbconnect
{
    private static $_instance; // reusable class obj
    private static $_idConnect; // id connect'a
    private $_configs = array(); // переменные коннекта
    private function __construct(){}
    public static function instance ()
    {
        if(empty(self::$_instance)) self::$_instance = new self();
        return self::$_instance;
	}
    public function set($array) // установим переменные в классе
    {
        $this->_configs = array
        (
           'host' => $array['host'],
           'user' => $array['user'],
           'pass' => $array['pass'],
           'name' => $array['name']
        );
    }

    public function connect () // вызываем метод и подключаемся
    {
        self::$_idConnect = DbSimple_Generic::connect("mysqli://".
        $this->_configs['user'].":".
        $this->_configs['pass']."@".
        $this->_configs['host']."/".
        $this->_configs['name']);
        self::$_idConnect->setIdentPrefix(TABLE_PREFIX);
        if(Config::instance()->get('dev_mode')==0) self::$_idConnect->setErrorHandler('databaseErrorHandler');
    }
    public function getConnect()
    {
        return self::$_idConnect;
    }
}
