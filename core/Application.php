<?php
namespace app\core;


class Application
{
    public static $DIR_NAME;
    public Router $router;
    public static $app;
    public Response $response;
    public Request $request;
    public Controller $controller;
    public function __construct($dirname){
        self::$app = $this;
        self::$DIR_NAME = $dirname;
        $this->request = new Request();
        $this->controller = new Controller();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }
    public function run(){
        echo  $this->router->resolve();
    }
}