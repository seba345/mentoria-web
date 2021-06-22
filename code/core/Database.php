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

        $files = scandir(Aplication::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration){
            if ($migration === '.' || $migration === '..'){
                continue;
            }

            require_once Aplication::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            echo "Applying migration $migration\n";
            $instance->up();
            echo "Applied migration $migration\n";

            $newMigrations[] = $migration;
        }
        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else{
            echo "All migrations has been applied\n";
        }
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
    public function saveMigrations(array $newMigrations){

        $values = implode(',', array_map(fn($m)=>"('$m')", $newMigrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $values");
        $statement->execute();
    }
 }