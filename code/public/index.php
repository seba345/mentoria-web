<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Aplication;



$app = new Aplication(dirname(__DIR__));


//$app->router->get('/code/public/contact', 'contact');
 
//$app->router->get('/code/public/', 'home');

$app->router->get('/code/public/contact', 'contact');
 
$app->router->get('/code/public/', 'contact');
$app->router->post('/code/public/contact', function(){
    return "Procesando IÑnformacion";
});


$app->run();