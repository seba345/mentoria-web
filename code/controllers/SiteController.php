<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
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