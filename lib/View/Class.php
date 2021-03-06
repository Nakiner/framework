<?php
class View_Class
{
    private $_conf;
    private $_layout = '';
    private $_view = '';
    private $_vars = array();
    private $_render;
    public function render($title, $meta_k = "", $meta_d = "", $render = true) // фуннкция вывода из файлов в контент на странице
    {
        if($render===false) $this->_render = false;
        if($this->_render === false) return false;
        $ext = $this->_conf->get('view_ext');
        $this->_layout = APP_PATH.DS.'View'.DS.'_layout'.DS.$this->_layout.$ext;
        $this->_view = APP_PATH.DS.'View'.DS.$this->_view.$ext;
        unset ($ext,$render);
        extract($this->_vars, EXTR_OVERWRITE);
        ob_start();
        include $this->_view;
        $content_for_layout = ob_get_clean();
		$files = scandir(APP_PATH.DS.'View'.DS.'_element'.DS);
		$variable = [];
		foreach($files as $val)
		{
			if($val!="." and $val != "..")
			{
				ob_start();
				include APP_PATH.DS.'View'.DS.'_element'.DS.$val;
				$variable[basename($val,".php")] = ob_get_clean();
			}
		}
		extract($variable, EXTR_OVERWRITE, "new_");
        if($this->_conf->get('qz_output')===1) ob_start ();
        else ob_start();
        include_once $this->_layout;
        header('Content-length: '.ob_get_length());
        $this->_render = false;
    }
    public function __construct($layout ='',$view = '') // сборщик класса, инит конфига, шаблона вьюхи, и подгрузка
    {
        $this->_conf = config::instance();
        $this->_layout = !empty($layout) ? $layout : $this->_conf->get('default_layout');
        $this->_view = !empty ($view) ? $view : className2fileName(Routing_Router::instance()->controller()).DS.Routing_Router::instance()->action();
        /*if(!empty ($view)) $this->_view = $view;
        else
        {
            $router = Routing_Router::instance();
            $this->_view = className2fileName($router->controller()).DS.$router->action();
        }*/
    }
	public function set($var, $value = '') // добавить переменную в класс или слияние массивов
    {
        /*if(is_array($var))
        {
            $keys = array_keys($var);
            $values = array_values($var);
            $this->_vars = array_merge($this->_vars, array_combine($keys, $values));
        }
        else $this->_vars[$var] = $value;*/
        return is_array($var) ? $this->_vars = array_merge($this->_vars, array_combine(array_keys($var), array_values($var))) : $this->_vars[$var] = $value;
    }
    public function __set($key,$value) // установка значений в массив
    {
        $this->_vars[$key] = $value;        
    }
    public function view($view) // Какую вьюху грузить будем
    {
        $this->_view = $view;
    }
	public function layout($layout) // какой шаблон будем использовать
    {
        $this->_layout = $layout;
    }
}