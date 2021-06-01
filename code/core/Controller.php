<?php
namespace app\core;

class controller
{  
    public string $layout ='main';
    
    public function render($view, $params = [])
    {
        return Aplication::$app->router->renderView($view, $params);
    }
    public function setLayout($layout)
    {
            $this->layout =$layout;
    }
}