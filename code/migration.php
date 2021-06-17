<?php

require_once __DIR__ . '/vendor/autoload.php';
use app\core\Aplication;

//$app = new Aplication(dirname(__DIR__));

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config =[
        'db' => [
            'dsn' => $_ENV['DSN'],
            'username' => $_ENV['USER'],
            'password' => $_ENV['PASSWORD'],
                ]
        ];

        $app = new Aplication(__DIR__, $config);
        $app->db->applyMigrations();
