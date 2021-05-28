<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
        'name' => 'Juan Perez',
        'surname' => 'Perez',
    ];

        //return Aplication::$app->router->renderView('home');
        return $this->render('home', $params);
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