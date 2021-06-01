<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Aplication;



$app = new Aplication(dirname(__DIR__));


//$app->router->get('/code/public/contact', 'contact');
 
//$app->router->get('/code/public/', 'home');

/*$app->router->get('/', 'home'); 
$app->router->get('/cont', 'contact');
$app->router->post('/cont', function(){
    return "Procesando Informacion";
});*/

$app->router->get('/', [\app\controllers\SiteController::class, 'home']); 
$app->router->get('/cont', [\app\controllers\SiteController::class, 'contact']); 
$app->router->post('/cont', [\app\controllers\SiteController::class, 'handleCont']); 

$app->router->get('/register', [\app\controllers\AuthController::class, 'register']); 
$app->router->post('/register', [\app\controllers\AuthController::class, 'register']); 

$app->router->get('/login', [\app\controllers\AuthController::class, 'login']); 
$app->router->post('/login', [\app\controllers\AuthController::class, 'login']); 


$app->run();
