<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
     //return Aplication::$app->router->renderView('home');
        return $this->render('home', [
            'name' => 'Juan ',
            'surname' => 'Perez',
        ]);
    }

    public function contact()
    {
        //return Aplication::$app->router->renderView('contact');
        return $this->render('contact');
    }

    
    public function handleCont()
    {
        return "Procesando Informacion";
    }
}