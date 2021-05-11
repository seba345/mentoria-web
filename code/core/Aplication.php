<?php
namespace app\core;

class Aplication
{
    public Router $router;
    public Request $request;


    public function __construct()
    {
        $this->request = new Request();
        $this->route = new Router($this->request);
    }
     
    public function run()
    {
        $this->router->resolve();
    }
}