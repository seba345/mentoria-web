<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new \app\core\Aplication();

$app->router->get('/code/', function(){
    return "Hola Mundo";
});

$app->router->get('/code/contact', function(){
    return "Contact";
});

$app->run();
