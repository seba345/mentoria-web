<?php

namespace app\controller;

use app\core\Aplication;
use app\core\controller;

class SiteController extends controller
{
    public function home()
    {
        //return Aplication::$app->router->renderView('home');
        return $this->render('home');
    }

    public function cont()
    {
        //return Aplication::$app->router->renderView('contact');
        return $this->render('cont');
    }

    
    public function handleCont()
    {
        return "Procesando Informacion";
    }
}