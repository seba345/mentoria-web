<?php

namespace app\core;

class Database
{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        // .env
        $dsn = $config['DSN'] ?? '';
        $username = $config['USERNAME'] ?? '';
        $password = $config['PASSWORD'] ?? '';

        $this->pdo = new \PDO($dsn, $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
    echo "Running applyMigration\n";
    }
 }