<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \app\core\Aplication();


$app->router->get('/code/contacto', 'contact');
 
$app->router->get('/code/', function(){
    return "Hola Mundo";
});


$app->run();