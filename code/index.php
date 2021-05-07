<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new \app\core\Aplication();

//$router = new Router();

//$router->get('/', function(){
//    return "Hola Mundo";
//});
$app->$router->get('/', function(){
    return "Hola Mundo";
});

$app->$router->get('/contact', function(){
    return "Contact";
});

$app->run();
