<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public  function tableName(): string;
    abstract public function attributes(): array;

    public function save()
    {
        $pdo = Aplication::$app->db->pdo;
        $tableName = $this->tableName();
        $sql = "DESC $tableName";
        $statement2 = $pdo->prepare($sql);
        /*print_r($tableName);
        print_r($sql);
        exit;*/
        $statement2->execute();
        $attributes = $statement2->fetchAll(\PDO::FETCH_COLUMN);;
        //anterior ini
        //$attributes = $this->attributes();
        //anterior fin
        //arrow
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        
        
        //INSERT INTO users ( firstname,lastname) VALUES (:firstname, :lastname...)
        $statement = $pdo->prepare("
        INSERT INTO $tableName 
            (". implode(",",$attributes) .")
        VALUES
            (". implode(",",$params) .")
        ");

        foreach($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
            //$statement->bindParam();
        }
        $statement->execute();
        return true;
    }


}