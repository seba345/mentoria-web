<?php
namespace app\core;

class Aplication
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
     
    public function run()
    {
        $this->router->resolve();
    }
}