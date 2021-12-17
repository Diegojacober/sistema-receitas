<?php
require_once "validador_acesso.php";

class Conexao{

    // private $host = '';
    // private $dbname = 'u632912901_otica';
    // private $user ="u632912901_diegoalencar" ;
    // private $pass = 'Di29122004' ;

    
    private $host = '127.0.0.1:3307';
    private $dbname = 'otica';
    private $user ="root" ;
    private $pass = '' ;

    public function conectar(){
        
        try{

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

           return $conexao;
           
        }
        catch(PDOException $e){
            echo '<p>' .$e->getMessage() .'</p>';
            echo 'ERRO AO CONECTAR BANCO DE DADOS';
        }
    }

}

?>