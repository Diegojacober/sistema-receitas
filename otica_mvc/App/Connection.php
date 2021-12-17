<?php

namespace App;

//passar a barra invertida nas classes nativas para o php entender


class Connection{
    public static function getDb(){
        try
        {
            $conn= new \PDO(
                "mysql:host=127.0.0.1:3307;dbname=otica;charset=utf8",
                "root",
                ""
            );

            
            return $conn;
        }
        catch(\PDOException $e){
                //tratar erro de alguma forma
                echo "Banco não conectado";
        }

    }
}

?>