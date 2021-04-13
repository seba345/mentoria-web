<?php

$dbname="registro";
$dbuser="registro_user";
$dbpassword="user2";



try {

    $dsn ="mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn,$dbuser, $dbpassword);

    echo "Conexion Correcta";
} catch (PDOException $e){
        echo $e->getMessage();
}

