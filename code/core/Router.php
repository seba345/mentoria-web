<?php
namespace app\core;
class Router
{
    public request $request;
    protected array $routes =[];

    public function __construct(\app\core\Request $request)
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

        print_r($this->routes);
        //var_dump($path);
        //var_dump($method);
    }
}