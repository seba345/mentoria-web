<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Aplication;



$app = new Aplication(dirname(__DIR__));


//$app->router->get('/code/public/contact', 'contact');
 
//$app->router->get('/code/public/', 'home');

$app->router->get('/code/public/contact/', 'contact');
 
$app->router->get('/code/public/', 'contact');


$app->run();