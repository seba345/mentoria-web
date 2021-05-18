<?php
namespace app\core;

class Aplication
{
    public Router $router;
    public Request $request;


    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }
     
    public function run()
    {
        echo $this->router->resolve();
    }
}