<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new \app\core\Aplication();

$app->router->get('/', function(){
    return "Hola Mundo";
});

$app->router->get('/contact', function(){
    return "Contact";
});

$app->run();
