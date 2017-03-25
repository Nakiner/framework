<?php
Class Controller_Pages extends Controller_Abstract
{
    public function error($param) // ф-я вызываемая при 404
    {
        $View = $this->loadView('error');
        $View->view('Pages/empty');
        $View->set('text', $param);
        $View->render("404");
    }
    public function index()
    {
        $View = $this->loadView('index');// _layout
        $View->view('Pages/index'); // Pages
        $View->render("Главная"); // title
    }
    public function articles()
    {
        $View = $this->loadView('index');
        $View->view('Pages/articles'); // Pages
        $View->render("Статьи"); // title
    }
}