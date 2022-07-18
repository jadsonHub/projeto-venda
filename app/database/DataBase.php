<?php


namespace App\database;
use App\controller\ErrorController;
use PDO;

class DataBase{
    
    public static function connect(){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=base_pw','root','123edu',[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
            return $pdo;
        }catch(\Exception $e){
          $error = new ErrorController();
          return $error->errorGetDB();
        }
       
    }
}


