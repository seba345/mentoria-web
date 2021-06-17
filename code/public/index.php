<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Aplication;

//$app = new Aplication(dirname(__DIR__));

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config =[
        'db' => [
            'dsn' => $_ENV['DSN'],
            'username' => $_ENV['USER'],
            'password' => $_ENV['PASSWORD'],
                ]
        ];
//$app->router->get('/code/public/contact', 'contact');
 
//$app->router->get('/code/public/', 'home');
var_dump($config);

$app = new Aplication(dirname(__DIR__), $config);
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
