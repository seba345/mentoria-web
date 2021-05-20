<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \app\core\Aplication();


$app->router->get('/code/public/contact', 'contact');
 
$app->router->get('/code/public/', 'home');


$app->run();