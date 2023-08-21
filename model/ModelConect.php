<?php
include('../config/config.php');

abstract class ModelConect
{
    protected function conectDB()
    {
        try{
            return new \PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASS);
        }catch(\PDOException $erro){
            return $erro->getMessage();
        }
    }
}
