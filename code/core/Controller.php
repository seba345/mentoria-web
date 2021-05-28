<?php
namespace app\core;

class controller
{
    public function render($view, $params = [])
    {
        return Aplication::$app->router->renderView($view, $params);
    }
}