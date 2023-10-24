<?php 

class Model{
    private static $pdo; 

    private function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost;dbname=SecureLog;charset=utf8","root","root");
    }

    public function getBdd(){
        if(self::$pdo == null){
            $this->setBdd();
        }
        return self::$pdo;
    }
}