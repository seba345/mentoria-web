<?php
namespace app\core;

class controller
{
    public function render($view)
    {
        return Aplication::$app->router->renderView($view);
    }
}