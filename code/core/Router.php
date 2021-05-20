<?php
namespace app\core;
class Router
{
    public request $request;
    protected array $routes =[];

    public function __construct(\app\core\request $request)
    {
        $this ->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
       /* echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
        exit;*/

        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback= $this->routes[$method][$path] ?? false;
      // print_r($this->routes);

       // var_dump($path);
      //  var_dump($method);
        if ($callback === false){
            return "not found";
   //principios SOLID
        }
     if (is_string($callback)){
                    return $this->renderView($callback);   
        }

        //print_r($this->routes);
        //var_dump($path);
        //var_dump($method);
        return call_user_func($callback);
    }

    public function renderView($view)
    { //interpolacion 

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}',$viewContent,$layoutContent);
       
    }

    public function layoutContent()
    {
        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view)
    {
        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}