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

$app->run();
