<?php

$dbname="registro";
$dbuser="registro_user";
$dbpassword="user2";

$dsn ="mysql:host=localhost;dbname=$dbname";
$db = new PDO($dsn,$dbuser, $dbpassword);
