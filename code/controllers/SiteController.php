<?php

namespace app\controller;

use app\core\Aplication;

class SiteController
{
    public function home()
    {
        return Aplication::$app->router->renderView('home');
    }

    public function cont()
    {
        return Aplication::$app->router->renderView('contact');
    }

    
    public function handleCont()
    {
        return "Procesando Informacion";
    }
}