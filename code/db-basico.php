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


//preparar consulta
$sql="INSERT into users 
(full_name,email,user_name, password)
values
(:full_name, :email, :user_name, :password)";

//statement
$stmt->prepare($sql);


$full_name ='Juan Perez';
$email ='juan.perez@segic.cl';
$user_name = 'juan.perez';
$password = 'juan123';

$stmt->bindParam(':full_name',$full_name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':user_name',$user_name);
$stmt->bindParam(':password',$password);

$stmt->execute();
