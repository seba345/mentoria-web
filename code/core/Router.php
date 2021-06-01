<?php
namespace app\core;
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes =[];

    public function __construct(Request $request,Response $response)
    {
        $this ->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
     //   echo '<pre>';
       // var_dump($_SERVER);
       // echo '</pre>';
      //  exit;

        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback= $this->routes[$method][$path] ?? false;
     /*  print_r($this->routes);
       echo '<br>';
        var_dump($path);
        echo '</br>';
        echo '<br>';
        var_dump($callback);
        echo '</br>';
        var_dump($method);
        exit;*/
        if ($callback === false){
            //Aplication::$app->response->setStatusCode(404);
            $this->response->setStatusCode(404);
            //return $this->renderContent("not found");
            return $this->renderView("_404");
   //principios SOLID
        }
     if (is_string($callback)){
                    return $this->renderView($callback);   
        }
        //array(2) { [0]=> string(29) "app\controller\SiteController" [1]=> string(4) "home" }
        if(is_array($callback)){
            Aplication::$app->controller = new $callback[0]();
            $callback[0]= Aplication::$app->controller;
        }

       // print_r($this->routes);
       // var_dump($path);
        //var_dump($method);
        return call_user_func($callback, $this->request);
    }
    public function renderContent($viewContent)
    { //interpolacion 

        $layoutContent = $this->layoutContent();
//        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}',$viewContent,$layoutContent);
       
    }
    public function renderView($view, $params = [])
    { //interpolacion 
     
        $layoutContent = $this->layoutContent();
       $viewContent = $this->renderOnlyView($view,$params);
        return str_replace('{{content}}',$viewContent,$layoutContent);
       
    }

    public function layoutContent()
    {
        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}