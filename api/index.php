<?php

$dsn="";
$username = "admin";
$password ="user1";
$pdo = new \PDO($dsn, $username, $password);

$sql = "SELECT * FROM users";
$statement = $this->pdo->prepare($sql);
$statement->execute();

$rows = $statement->fetchall(\PDO::FETCH_ASSOC);

header('content-type: application/json');
echo json_encode($rows);
