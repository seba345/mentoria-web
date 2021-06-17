<?php

namespace  app\core\widgets;

use app\core\Model;

class Form 
{
    public static function begin($action, $method) 
    {
        //format python
            echo sprintf('<form action="%s" method="%s">',$action, $method);
            return new Form();
    }

    public static function end() 
    {
        echo '</form>';
    }
//tyope hint
//Polimorfismo
    public function field(Model $model, string $attribute)
    {
            return new Field($model, $attribute);
    }
}