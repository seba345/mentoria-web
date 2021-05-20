<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Aplication;

echo __DIR__;
echo "<br>";
echo dirname(__DIR__);

$app = new Aplication();


//$app->router->get('/code/public/contact', 'contact');
 
//$app->router->get('/code/public/', 'home');

$app->router->get('/code/public/contact', 'contact');
 
$app->router->get('/code/public/', 'contact');


$app->run();