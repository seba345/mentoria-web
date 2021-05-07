<?php

function connectDB()
{
    $dbname = "registro";
    $dbuser = "admin";
    $dbpassword = "user1";

    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";
        $db = new PDO($dsn, $dbuser, $dbpassword);
        return $db;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}