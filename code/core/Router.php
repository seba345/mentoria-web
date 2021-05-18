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
        include_once __DIR__ . "/../views/$view.php";
    }
}