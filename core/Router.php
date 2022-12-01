<?php
namespace app\core;
class Router
{
    protected array $routes = [];
    protected Request $request;
    public Response $response;

    public function __construct(Request $request,Response $response){
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path,$callback){
        $this->routes["get"][$path] = $callback;
    }

    public function resolve()
    {
        $path =  $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatusCode(404);
            return "Not Found";
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback,$this->request);
    }

    public function renderView($view,$prams = [])
    {
        $layout = $this->renderLayout();
        $view = $this->renderOnlyView($view,$prams);
        return str_replace("{{Content}}",$view,$layout);
    }

    private function renderLayout()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include Application::$DIR_NAME . "/views/layout/$layout.php";
        return ob_get_clean();
    }

    private function renderOnlyView($view,$parms)
    {
        foreach ($parms as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include Application::$DIR_NAME . "/views/$view.php";
        return ob_get_clean();
    }

    public function post($path,$callback)
    {
        $this->routes["post"][$path] = $callback;
    }

}