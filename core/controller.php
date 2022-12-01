<?php
namespace app\core;
class Controller{
    public $layout = "main";
    public function render($view,$params = array()){
        echo  Application::$app->router->renderView($view,$params);
    }
    public function setLayout($layout){
        $this->layout = $layout;
    }
}