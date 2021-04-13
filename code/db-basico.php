<?php

$dbname="registro";
$dbuser="admin";
$dbpassword="user1";



try {

    $dsn ="mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn,$dbuser, $dbpassword);

   echo "Insertó correctamente". "</br>";
} catch (PDOException $e){
        echo $e->getMessage();
}

/*
        //preparar consulta
        $sql = "INSERT INTO users 
        (full_name,email,user_name, password)
        values
        (:full_name, :email, :user_name, :password)";

        //statement
        $stmt= $db->prepare($sql);


        $full_name ='Juan Perez';
        $email ='juan.perez@segic.cl';
        $user_name = 'juan.perez';
        $password = 'juan123';

        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
*/



//queryin data
$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();
$users= $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
    echo $user['id'] . "</br>";
    echo $user['full_name']. "</br>";
}

