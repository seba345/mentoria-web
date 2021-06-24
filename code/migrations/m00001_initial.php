<?php

class m00001_initial{
    public function up()
    {        
        $db = \app\core\Aplication::$app->db;

        $sql = "CREATE TABLE `users2` (
            `id` int NOT NULL,
            `firstName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
            `lastName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
            `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
            `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
          
          $db->pdo->exec($sql);

          $sql = "ALTER TABLE `users2`
            ADD PRIMARY KEY (`id`)";
          $db->pdo->exec($sql);

          $sql = "ALTER TABLE `users2`
            MODIFY `id` int NOT NULL AUTO_INCREMENT";
          $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Aplication::$app->db;
        $sql = "DROP TABLE `users2`";
            
        $db->pdo->exec($sql);  
    }
}