<?php

class m00001_initial{
    public function up()
    {        
        $db = \app\core\Aplication::$app->db;

        $sql = "CREATE TABLE `users` (
            `id` int NOT NULL,
            `full_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
            `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
            `user_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
            `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
          
          $db->pdo->exec($sql);

          $sql = "ALTER TABLE `users`
            ADD PRIMARY KEY (`id`)";
          $db->pdo->exec($sql);

          $sql = "ALTER TABLE `users`
            MODIFY `id` int NOT NULL AUTO_INCREMENT";
          $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Aplication::$app->db;
        $sql = "DROP TABLE `users`";
            
        $db->pdo->exec($sql);
    }
}