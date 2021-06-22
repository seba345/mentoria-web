<?php

namespace app\core;

class Database
{
    public \PDO $pdo;

    public function __construct(array $config)
    {
        // .env
        $dsn = $config['dsn'] ?? '';
        $username = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new \PDO($dsn, $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();

        $appliedMigrations = $this->getAppliedMigrations();
    }
   
    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS `migrations` ( `id` INT NOT NULL AUTO_INCREMENT , `migration` VARCHAR(255) NOT NULL , `dreated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
    }

    public function getAppliedMigrations()
    {
        $sql = "select migration from migrations";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

 }